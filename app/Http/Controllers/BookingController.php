<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Services\EmailService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class BookingController extends Controller
{
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
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'user_password' => ['nullable', 'string', 'min:8'],
            ]);
        }


        $data = request()->all();

        $date = date("Y-m-d");
        $time = date("h:i:s");
        $payment_status = 'Unpaid';
        $now = $date . ' ' . $time;
        $order_status = 'Failed';
        $posted = 'No';
        $checkin = strtotime($data['checkin']);
        $checkout = strtotime($data['checkout']);

        $result = Booking::where('room', '=', $data['selected_room_input'])->where('checkin', '<=', $checkin)->where('checkout', '>=', $checkin)->where('checkout', '>=', $checkout)->where('checkin', '<=', $checkout)->where('order_status', '=', 'Successful')->count();


        if ($data['selected_room_input'] == 'Superior Room' && (188 - $result) <  $data['num_of_rooms']) {
            return redirect('/booking')->with('nothing', 'Sorry, the room you searched is currently unavailable, please adjust your specifications and try again');
        } elseif ($data['selected_room_input'] == 'Superior Room (Double)' && (10 - $result) <  $data['num_of_rooms']) {
            return redirect('/booking')->with('nothing', 'Sorry, the room you searched is currently unavailable, please adjust your specifications and try again');
        } elseif ($data['selected_room_input'] == 'Executive Suite' && (9 - $result) <  $data['num_of_rooms']) {
            return redirect('/booking')->with('nothing', 'Sorry, the room you searched is currently unavailable, please adjust your specifications and try again');
        } elseif ($data['selected_room_input'] == 'Diplomatic Suite' && (2 - $result) <  $data['num_of_rooms']) {
            return redirect('/booking')->with('nothing', 'Sorry, the room you searched is currently unavailable, please adjust your specifications and try again');
        } elseif ($data['selected_room_input'] == 'Presidential Suite' && (1 - $result) <  $data['num_of_rooms']) {
            return redirect('/booking')->with('nothing', 'Sorry, the room you searched is currently unavailable, please adjust your specifications and try again');
        } else {

            if (isset(Auth::User()->id)) {
                $user_id = Auth::User()->id;
            } else {
                User::create([
                    'first_name' => $data['firstname'],
                    'last_name' => $data['lastname'],
                    'email' => $data['email'],
                    'phone' => $data['phonenumber'],
                    'password' => Hash::make($data['user_password']),
                ]);

                $user_id = User::where('email', '=', $data['email'])->first()->id;
            }

            // Create booking
            Booking::create([
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
            ]);

            // Retrieve user for email data
            $user = User::find($user_id);

            $emailData = [
                'guest_name' => $user->first_name . ' ' . $user->last_name,
                'guest_email' => $user->email,
                'guest_phone' => $user->phone,
                'room' => $data['selected_room_input'],
                'num_of_rooms' => $data['num_of_rooms'],
                'checkin' => $data['checkin'],
                'checkout' => $data['checkout'],
                'amount' => $data['amount'],
                'payment_status' => $payment_status,
                'ref_num' => $data['ref'],
                'created_at' => $now,
                'admin_dashboard_url' => url('/admin/bookings'),
            ];

            $emailService = new EmailService();

            $emailService->sendEmail(
                $user->email,
                'BookingConfirmation',
                $emailData
            );


            $adminEmail = env('ADMIN_EMAIL', 'reservationLNL@landmarkafrica.com');
            $emailService->sendEmail(
                $adminEmail,
                'AdminBookingNotification',
                $emailData
            );
        }

        // Rave::initialize(route('callback'));
        return redirect('/booking')->with('success', 'Your reservation has been saved');
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
            \Log::error('Paystack verification error: ' . $err);
            return redirect('/booking')->with('failed', 'Payment verification failed. Please contact support.');
        }

        $result = json_decode($response, true);

        if (!$result || !isset($result['status']) || !$result['status']) {
            \Log::error('Paystack verification failed', ['response' => $response]);
            return redirect('/booking')->with('failed', 'Payment verification failed. Please try again.');
        }

        $data = $result['data'];

        // Extract payment details
        $paymentStatus = $data['status']; // success, failed, abandoned
        $amount = $data['amount'] / 100; // Paystack returns amount in kobo
        $currency = $data['currency'];
        $customerEmail = $data['customer']['email'];
        $reference = $data['reference'];

        // Find the booking by reference
        $booking = Booking::with(['user'])->where('ref_num', $reference)->first();

        if (!$booking) {
            \Log::error('Booking not found for reference: ' . $reference);
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
            ]);

            \Log::info('Payment successful for booking: ' . $booking->ref_num);

            return redirect('/booking')->with('success', 'Your reservation has been booked successfully! Please check your email for confirmation. Thanks');
        } else {
            // Payment failed or invalid
            \Log::warning('Payment validation failed', [
                'reference' => $reference,
                'status' => $paymentStatus,
                'expected_amount' => $booking->amount,
                'received_amount' => $amount,
            ]);

            return redirect('/booking')->with('failed', 'Your payment could not be verified. Please contact support if you were charged. Thanks');
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
