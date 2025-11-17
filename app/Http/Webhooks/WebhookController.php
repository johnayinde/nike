<?php

namespace App\Http\Webhooks;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Traits\PaystackApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    use PaystackApiTrait;

    /**
     * Handle Paystack webhook events
     */
    public function handlePaystackWebhook(Request $request)
    {
        // Verify the webhook signature
        $signature = $request->header('x-paystack-signature');
        $body = $request->getContent();

        if (!$this->verifyWebhookSignature($signature, $body)) {
            Log::warning('Invalid Paystack webhook signature', [
                'ip' => $request->ip()
            ]);
            return response()->json(['error' => 'Invalid signature'], 401);
        }

        // Get the event data
        $event = json_decode($body);

        // Handle different event types
        switch ($event->event) {
            case 'charge.success':
                return $this->handleSuccessfulCharge($event->data);

            case 'charge.failed':
                return $this->handleFailedCharge($event->data);

            default:
                Log::info('Unhandled Paystack webhook event', [
                    'event' => $event->event
                ]);
                return response()->json(['message' => 'Event received'], 200);
        }
    }

    /**
     * Verify webhook signature from Paystack
     */
    protected function verifyWebhookSignature(?string $signature, string $body): bool
    {
        if (!$signature) {
            return false;
        }

        $secretKey = config('services.paystack.secret_key');
        $computedSignature = hash_hmac('sha512', $body, $secretKey);

        return hash_equals($computedSignature, $signature);
    }

    /**
     * Handle successful payment charge
     */
    protected function handleSuccessfulCharge($data)
    {
        try {
            // Get the booking reference from the transaction
            $reference = $data->reference;

            // Find the booking by reference number
            $booking = Booking::where('ref_num', $reference)->first();

            if (!$booking) {
                Log::warning('Booking not found for successful payment', [
                    'reference' => $reference
                ]);
                return response()->json(['message' => 'Booking not found'], 404);
            }

            // Check if payment was already processed
            if ($booking->isPaid()) {
                Log::info('Payment already processed', [
                    'booking_id' => $booking->id,
                    'reference' => $reference
                ]);
                return response()->json(['message' => 'Payment already processed'], 200);
            }

            // Verify the payment with Paystack API to ensure it's legitimate
            $verified = $this->verifyPaystackTransaction($reference);

            if (!$verified || $verified->status !== 'success') {
                Log::error('Payment verification failed', [
                    'booking_id' => $booking->id,
                    'reference' => $reference
                ]);
                return response()->json(['error' => 'Payment verification failed'], 400);
            }

            // Verify amount matches (convert kobo to naira)
            $paidAmount = $verified->amount / 100;
            if (abs($paidAmount - $booking->amount) > 0.01) {
                Log::error('Payment amount mismatch', [
                    'booking_id' => $booking->id,
                    'expected' => $booking->amount,
                    'received' => $paidAmount
                ]);
                return response()->json(['error' => 'Amount mismatch'], 400);
            }

            // Update booking status
            $booking->update([
                'payment_status' => 'Paid',
                'order_status' => 'Reserved',
                'raveref' => $data->reference ?? null,
                'posted' => 'Yes'
            ]);

            Log::info('Booking payment confirmed', [
                'booking_id' => $booking->id,
                'reference' => $reference,
                'amount' => $paidAmount
            ]);

            // You can add email notification here if needed
            // $booking->user->notify(new BookingConfirmedNotification($booking));

            return response()->json([
                'message' => 'Payment processed successfully',
                'booking_id' => $booking->id
            ], 200);
        } catch (\Exception $e) {
            Log::error('Webhook processing error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Processing failed'], 500);
        }
    }

    /**
     * Handle failed payment charge
     */
    protected function handleFailedCharge($data)
    {
        try {
            $reference = $data->reference;
            $booking = Booking::where('ref_num', $reference)->first();

            if ($booking) {
                $booking->update([
                    'payment_status' => 'Failed',
                    'order_status' => 'Failed'
                ]);

                Log::info('Payment failed for booking', [
                    'booking_id' => $booking->id,
                    'reference' => $reference
                ]);
            }

            return response()->json(['message' => 'Payment failure recorded'], 200);
        } catch (\Exception $e) {
            Log::error('Failed charge webhook error', [
                'error' => $e->getMessage()
            ]);
            return response()->json(['error' => 'Processing failed'], 500);
        }
    }

    /**
     * Verify transaction with Paystack API
     */
    protected function verifyPaystackTransaction(string $reference)
    {
        try {
            $this->initializePaystack();

            $verifyUrl = str_replace('/transaction/initialize', "/transaction/verify/{$reference}", $this->baseUri);

            $result = $this->callApi($this->headers, $verifyUrl, 'GET');

            if (isset($result->status) && $result->status === true) {
                return $result->data;
            }

            return null;
        } catch (\Exception $e) {
            Log::error('Payment verification API error', [
                'reference' => $reference,
                'error' => $e->getMessage()
            ]);
            return null;
        }
    }
}
