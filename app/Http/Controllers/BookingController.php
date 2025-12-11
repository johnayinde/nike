<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\RoomGroup;
use App\Services\EmailService;
use App\Traits\RoomBookingTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class BookingController extends Controller
{
    use RoomBookingTrait;
    //    public function __construct()
    //    {
    //        $this->middleware('auth');
    //    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('booking');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function initialize(Request $request)
    {
        if (isset(Auth::User()->id)) {

            $request->validate([
                'selected_room_input' => ['required', 'string', 'max:22', 'min:13'],
                'amount' => ['required', 'string', 'max:255'],
                'checkin' => ['required', 'string', 'max:255'],
                'checkout' => ['required', 'string', 'max:255'],
                'num_of_rooms' => ['required', 'string', 'max:255'],
            ]);
        } else {
            $request->validate([
                'selected_room_input' => ['required', 'string', 'max:22', 'min:13'],
                'amount' => ['required', 'string', 'max:255'],
                'checkin' => ['required', 'string', 'max:255'],
                'checkout' => ['required', 'string', 'max:255'],
                'num_of_rooms' => ['required', 'string', 'max:255'],
                'firstname' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[a-zA-Z ]+$/'],
                'lastname' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[a-zA-Z ]+$/'],
                'phonenumber' => ['required', 'min:10', 'max:20'],
                'full_phone' => ['nullable', 'string', 'min:12', 'max:25'], // For international format
                'country_code' => ['nullable', 'string', 'max:5'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'user_password' => ['nullable', 'string', 'min:8'],
            ]);
        }


        $data = request()->all();

        $data['ref'] = 'NLR-' . strtoupper(uniqid());

        $date = date("Y-m-d");
        $time = date("h:i:s");

        $now = $date . ' ' . $time;

        $payment_status = 'Pending';
        $now = $date . ' ' . $time;
        $order_status = 'Pending';
        $posted = 'No';
        $checkin = strtotime($data['checkin']);
        $checkout = strtotime($data['checkout']);

        // Check room availability using the new dynamic system
        $roomGroup = RoomGroup::where('name', $data['selected_room_input'])->first();

        if (!$roomGroup) {
            return redirect('/booking')->with('nothing', 'Invalid room type selected. Please try again.');
        }

        $availability = $this->checkAvailability(
            $roomGroup->id,
            date('Y-m-d', $checkin),
            date('Y-m-d', $checkout),
            $data['num_of_rooms']
        );

        if (!$availability['available']) {
            return redirect('/booking')->with('nothing', 'Sorry, the room you searched is currently unavailable. ' . $availability['message'] . '. Please adjust your specifications and try again.');
        } else {

            if (isset(Auth::User()->id)) {
                $user_id = Auth::User()->id;
            } else {
                // Check if user exists
                $existingUser = User::where('email', $data['email'])->first();

                if ($existingUser) {
                    // User exists, update their information
                    $updateData = [
                        'first_name' => $data['firstname'],
                        'last_name' => $data['lastname'],
                        'phone' => !empty($data['full_phone']) ? $data['full_phone'] : $data['phonenumber'],
                    ];

                    // Only update password if a new one is provided
                    if (!empty($data['user_password'])) {
                        $updateData['password'] = Hash::make($data['user_password']);
                    }

                    $existingUser->update($updateData);
                    $user_id = $existingUser->id;
                } else {
                    // User doesn't exist, create new user
                    $user = User::create([
                        'first_name' => $data['firstname'],
                        'last_name' => $data['lastname'],
                        'email' => $data['email'],
                        'phone' => !empty($data['full_phone']) ? $data['full_phone'] : $data['phonenumber'],
                        'password' => Hash::make($data['user_password'] ?: 'defaultpassword123'),
                    ]);

                    $user_id = $user->id;
                }
            }

            // Create booking
            $booking =  Booking::create([
                'user_id' => $user_id,
                'room' => $data['selected_room_input'],
                'checkin' => $data['checkin'],
                'checkout' => $data['checkout'],
                'num_of_rooms' => $data['num_of_rooms'],
                'amount' => $data['amount'],
                'payment_status' => $payment_status,
                'created_at' => $now,
                'order_status' => $order_status,
                'posted' => $posted,
                'ref_num' => $data['ref'],
                'tracking_link_id' => session('room_tracking_link_id'),
                'traffic_source' => session('room_tracking_ref'),
            ]);

            Log::info('Booking created, redirecting to payment', [
                'booking_id' => $booking->id,
                'reference' => $data['ref'],
            ]);


            // Retrieve user for email data
            // $user = User::find($user_id);

            // $emailData = [
            //     'guest_name' => $user->first_name . ' ' . $user->last_name,
            //     'guest_email' => $user->email,
            //     'guest_phone' => $user->phone,
            //     'room' => $data['selected_room_input'],
            //     'num_of_rooms' => $data['num_of_rooms'],
            //     'checkin' => $data['checkin'],
            //     'checkout' => $data['checkout'],
            //     'amount' => $data['amount'],
            //     'payment_status' => $payment_status,
            //     'ref_num' => $data['ref'],
            //     'created_at' => $now,
            //     'admin_dashboard_url' => url('/admin/bookings'),
            // ];

            // $emailService = new EmailService();

            // $emailService->sendEmail(
            //     $user->email,
            //     'BookingConfirmation',
            //     $emailData
            // );


            // $adminEmail = config('mail.mailers.smtp.admin_email');
            // $emailService->sendEmail(
            //     $adminEmail,
            //     'AdminBookingNotification',
            //     $emailData
            // );
            return $this->initializePaystackPayment($booking);
        }

        // Rave::initialize(route('callback'));
        // return redirect('/booking')->with('success', 'Your reservation has been saved');
    }


    /**
     * Initialize Paystack payment and redirect
     */
    private function initializePaystackPayment(Booking $booking)
    {
        $user = $booking->user;

        $paymentData = [
            'email' => $user->email,
            'amount' => $booking->amount * 100, // Convert to kobo
            'reference' => $booking->ref_num,
            'callback_url' => route('payment.callback'),
            'metadata' => [
                'booking_id' => $booking->id,
                'customer_name' => $user->first_name . ' ' . $user->last_name,
                'customer_phone' => $user->phone,
                'room_type' => $booking->room,
                'num_of_rooms' => $booking->num_of_rooms,
                'checkin' => $booking->checkin,
                'checkout' => $booking->checkout,
            ],
        ];

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.paystack.secret_key'),
            ])->post('https://api.paystack.co/transaction/initialize', $paymentData);

            if ($response->failed() || !isset($response['status']) || !$response['status']) {
                Log::error('Paystack initialization failed', ['response' => $response->body(), 'booking_id' => $booking->id]);
                $booking->delete(); // Delete failed booking
                return redirect('/booking')->with('failed', 'Payment initialization failed. Please try again.');
            }

            // Store payment link
            $booking->update(['payment_link' => $response['data']['authorization_url']]);

            Log::info('Redirecting to Paystack', ['booking_id' => $booking->id]);

            // Redirect to Paystack payment page IMMEDIATELY
            return redirect($response['data']['authorization_url']);
        } catch (\Exception $e) {
            Log::error('Paystack initialization error', ['error' => $e->getMessage(), 'booking_id' => $booking->id]);
            $booking->delete(); // Delete failed booking
            return redirect('/booking')->with('failed', 'Unable to initialize payment. Please try again.');
        }
    }

    /**
     * Handle Paystack payment callback
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback(Request $request)
    {
        // Get the reference from Paystack callback
        $reference = $request->query('reference');

        if (!$reference) {
            Log::warning('Payment callback without reference');
            return redirect('/booking')->with('failed', 'Invalid payment reference. Please try again.');
        }

        // Verify transaction with Paystack
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer " . config('services.paystack.secret_key'),
                "Cache-Control: no-cache",
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            Log::error('Paystack verification error: ' . $err);
            return redirect('/booking')->with('failed', 'Payment verification failed. Please contact support.');
        }

        $result = json_decode($response, true);

        if (!$result || !isset($result['status']) || !$result['status']) {
            Log::error('Paystack verification failed', ['response' => $response]);
            return redirect('/booking')->with('failed', 'Payment verification failed. Please try again.');
        }

        $data = $result['data'];

        // Extract payment details
        $paymentStatus = $data['status']; // success, failed, abandoned
        $amount = $data['amount'] / 100; // Paystack returns amount in kobo
        $currency = $data['currency'];
        $customerEmail = $data['customer']['email'];
        $paidAt = $data['paid_at'] ?? null;

        // Find the booking by reference
        $booking = Booking::with(['user'])->where('ref_num', $reference)->first();

        if (!$booking) {
            Log::error('Booking not found for reference: ' . $reference);
            return redirect('/booking')->with('failed', 'Booking not found. Please contact support.');
        }

        // Validate payment details
        $isValid = (
            $paymentStatus === 'success' &&
            $customerEmail === $booking->user->email &&
            $amount == $booking->amount &&
            $currency === 'NGN'
        );

        if ($isValid) {
            // Update booking status
            $booking->update([
                'payment_status' => 'Paid',
                'order_status' => 'Reserved',
                'posted' => 'Yes',
                'paid_at' => $paidAt ? Carbon::parse($paidAt) : now(),
            ]);

            Log::info('Payment successful for booking: ' . $booking->ref_num);

            // Update tracking link statistics if this booking came from a tracking link
            if ($booking->tracking_link_id) {
                $trackingLink = \App\Models\RoomTrackingLink::find($booking->tracking_link_id);
                if ($trackingLink) {
                    $checkin = Carbon::parse($booking->checkin);
                    $checkout = Carbon::parse($booking->checkout);
                    $nights = $checkin->diffInDays($checkout);

                    $trackingLink->recordBooking(
                        $booking->amount,
                        $nights,
                        $booking->num_of_rooms
                    );
                }
            }

            $this->sendConfirmationEmails($booking);

            // Redirect to success page
            return view('payment-success', [
                'booking' => $booking,
                'user' => $booking->user,
            ]);
        } else {
            // Payment failed or invalid
            Log::warning('Payment validation failed', [
                'reference' => $reference,
                'status' => $paymentStatus,
                'expected_amount' => $booking->amount,
                'received_amount' => $amount,
            ]);

            $booking->update([
                'payment_status' => 'Failed',
                'order_status' => 'Payment Failed',
            ]);

            return redirect('/booking')->with('failed', 'Payment could not be verified. If you were charged, please contact support with reference: ' . $reference);
        }
    }



    /**
     * Send confirmation emails to user and admin (called ONLY after successful payment)
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

            // Send confirmation email to user
            $emailService->sendEmail(
                $user->email,
                'BookingConfirmation',
                $emailData
            );

            // Send notification email to admin
            $adminEmail = config('mail.mailers.smtp.admin_email');
            if ($adminEmail) {
                $emailService->sendEmail(
                    $adminEmail,
                    'AdminBookingNotification',
                    $emailData
                );
            }

            Log::info('Confirmation emails sent', ['booking_id' => $booking->id]);
        } catch (\Exception $e) {
            Log::error('Failed to send confirmation emails', [
                'booking_id' => $booking->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Process payment for a booking
     *
     * @param  \App\Models\Booking  $booking
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function processPayment(Booking $booking, Request $request)
    {
        // Verify the reference number matches (security check)
        if ($request->has('ref') && $request->ref !== $booking->ref_num) {
            abort(403, 'Invalid booking reference');
        }

        // Check if booking is already paid
        if ($booking->isPaid()) {
            return redirect()->route('home')->with('info', 'This booking has already been paid.');
        }

        // Redirect to payment initialization with booking details
        return view('payment-link', [
            'booking' => $booking,
            'user' => $booking->user,
        ]);
    }
}
