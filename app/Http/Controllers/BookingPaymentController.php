<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Notifications\BookingPaymentLinkNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookingPaymentController extends Controller
{
    /**
     * Send payment link to customer
     */
    public function sendPaymentLink(Request $request, Booking $booking)
    {
        try {
            // Check if already paid
            if ($booking->isPaid()) {
                return response()->json([
                    'success' => false,
                    'message' => 'This booking has already been paid.'
                ], 400);
            }

            // Validate that booking has a user with email
            if (!$booking->user?->email) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid booking or missing customer email.'
                ], 400);
            }

            // Generate Paystack payment link
            $paystackLink = $booking->generatePaystackPaymentLink();

            if (!$paystackLink) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unable to generate payment link. Please try again.'
                ], 500);
            }

            // Send email notification with payment link
            $booking->user->notify(new BookingPaymentLinkNotification($booking, $paystackLink));

            return response()->json([
                'success' => true,
                'message' => 'Payment link has been sent to ' . $booking->user->email
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to send payment link', [
                'booking_id' => $booking->id,
                'error' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred. Please try again.'
            ], 500);
        }
    }
}
