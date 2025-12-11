<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class WebhookController extends Controller
{
    /**
     * Handle Paystack webhook events
     */
    public function handlePaystackWebhook(Request $request)
    {
        // Verify webhook signature
        $signature = $request->header('x-paystack-signature');
        $body = $request->getContent();
        $hash = hash_hmac('sha512', $body, config('services.paystack.secret_key'));

        if ($signature !== $hash) {
            Log::warning('Invalid Paystack webhook signature');
            return response()->json(['message' => 'Invalid signature'], 401);
        }

        $event = $request->input('event');
        $data = $request->input('data');

        Log::info('Paystack webhook received', ['event' => $event, 'reference' => $data['reference'] ?? 'N/A']);

        // Handle different webhook events
        switch ($event) {
            case 'charge.success':
                return $this->handleChargeSuccess($data);

            case 'charge.failed':
                return $this->handleChargeFailed($data);

            default:
                Log::info('Unhandled webhook event', ['event' => $event]);
        }

        return response()->json(['message' => 'Webhook processed'], 200);
    }

    /**
     * Handle successful payment webhook
     */
    private function handleChargeSuccess($data)
    {
        $reference = $data['reference'];
        $amount = $data['amount'] / 100;
        $currency = $data['currency'];
        $status = $data['status'];
        $paidAt = $data['paid_at'] ?? null;

        $booking = Booking::with('user')->where('ref_num', $reference)->first();

        if (!$booking) {
            Log::warning('Booking not found for webhook', ['reference' => $reference]);
            return response()->json(['message' => 'Booking not found'], 404);
        }

        // Check if already processed
        if ($booking->payment_status === 'Paid') {
            Log::info('Payment already processed', ['booking_id' => $booking->id]);
            return response()->json(['message' => 'Already processed'], 200);
        }

        // Validate payment details
        if ($status === 'success' && $amount == $booking->amount && $currency === 'NGN') {
            $booking->update([
                'payment_status' => 'Paid',
                'order_status' => 'Reserved',
                'posted' => 'Yes',
                'paid_at' => $paidAt ? Carbon::parse($paidAt) : now(),
            ]);

            Log::info('Payment updated via webhook', ['booking_id' => $booking->id]);

            // Link booking to tracking link if exists
            if ($booking->tracking_link_id) {
                $trackingLink = \App\Models\RoomTrackingLink::find($booking->tracking_link_id);
                if ($trackingLink) {
                    $checkin = \Carbon\Carbon::parse($booking->checkin);
                    $checkout = \Carbon\Carbon::parse($booking->checkout);
                    $nights = $checkin->diffInDays($checkout);

                    $trackingLink->recordBooking(
                        $booking->amount,
                        $nights,
                        $booking->num_of_rooms
                    );
                }
            }

            // Send confirmation emails if not already sent
            $this->sendConfirmationEmails($booking);

            return response()->json(['message' => 'Payment processed successfully'], 200);
        }

        Log::warning('Payment validation failed in webhook', [
            'expected' => $booking->amount,
            'received' => $amount,
        ]);

        return response()->json(['message' => 'Payment validation failed'], 400);
    }

    /**
     * Handle failed payment webhook
     */
    private function handleChargeFailed($data)
    {
        $reference = $data['reference'];

        $booking = Booking::where('ref_num', $reference)->first();

        if (!$booking) {
            Log::warning('Booking not found for failed payment', ['reference' => $reference]);
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->update([
            'payment_status' => 'Failed',
            'order_status' => 'Payment Failed',
        ]);

        Log::info('Payment failed via webhook', ['booking_id' => $booking->id]);

        return response()->json(['message' => 'Payment failure recorded'], 200);
    }

    /**
     * Send confirmation emails
     */
    private function sendConfirmationEmails(Booking $booking)
    {
        try {
            $user = $booking->user;

            $emailData = [
                'guest_name' => $user->first_name . ' ' . $user->last_name,
                'guest_email' => $user->email,
                'guest_phone' => $user->phone,
                'room' => $booking->room,
                'num_of_rooms' => $booking->num_of_rooms,
                'checkin' => $booking->checkin,
                'checkout' => $booking->checkout,
                'amount' => $booking->amount,
                'payment_status' => $booking->payment_status,
                'ref_num' => $booking->ref_num,
                'created_at' => $booking->created_at,
                'admin_dashboard_url' => url('/admin/bookings'),
            ];

            $emailService = new EmailService();

            $emailService->sendEmail($user->email, 'BookingConfirmation', $emailData);

            $adminEmail = config('mail.mailers.smtp.admin_email');
            if ($adminEmail) {
                $emailService->sendEmail($adminEmail, 'AdminBookingNotification', $emailData);
            }

            Log::info('Webhook confirmation emails sent', ['booking_id' => $booking->id]);
        } catch (\Exception $e) {
            Log::error('Failed to send webhook emails', [
                'booking_id' => $booking->id,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
