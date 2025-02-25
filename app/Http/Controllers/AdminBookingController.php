<?php

namespace App\Http\Controllers;

use App\Booking;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class AdminBookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::User()->is_admin != Null){
            $orders = Booking::with(['user'])->orderBy('id', 'desc')->get();
            $guests = User::where('is_admin', '=', Null)->orderBy('id', 'desc')->get();

            return view('admin.bookings', compact('orders', 'guests'));
        }

        return redirect('/');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request)
    {
        $request->validate([
            'guest' => ['required', 'string'],
            'room' => ['required', 'string'],
            'amount' => ['required', 'string', 'max:255'],
            'checkin' => ['required', 'string', 'max:255'],
            'checkout' => ['required', 'string', 'max:255'],
            'rooms' => ['required', 'string', 'max:255'],
        ]);

        $data = request()->all();

        $date=date("Y-m-d");
        $time=date("h:i:s");
        $payment_status = 'Paid';
        $now = $date.' '.$time;
        $order_status = 'Successful';
        $posted = 'No';
        $checkin = strtotime($data['checkin']);
        $checkout = strtotime($data['checkout']);

        $result = Booking::where('room','=',$data['room'])->where('checkin','<=',$checkin)->where('checkout','>=',$checkin)->where('checkout','>=',$checkout)->where('checkin','<=',$checkout)->where('order_status','=','Successful')->count  ();

        if($data['room'] == 'Superior Room' && (188 - $result) <  $data['rooms']){
            return redirect('/admin/bookings')->with('failed', 'Sorry, the room you searched is currently unavailable, please adjust your specifications and try again');
        }
        elseif($data['room'] == 'Superior Room (Double)' && (10 - $result) <  $data['rooms']){
            return redirect('/admin/bookings')->with('failed', 'Sorry, the room you searched is currently unavailable, please adjust your specifications and try again');
        }
        elseif($data['room'] == 'Executive Suite' && (9 - $result) <  $data['rooms']){
            return redirect('/admin/bookings')->with('failed', 'Sorry, the room you searched is currently unavailable, please adjust your specifications and try again');
        }
        elseif($data['room'] == 'Diplomatic Suite' && (2 - $result) <  $data['rooms']){
            return redirect('/admin/bookings')->with('failed', 'Sorry, the room you searched is currently unavailable, please adjust your specifications and try again');
        }
        elseif($data['room'] == 'Presidential Suite' && (1 - $result) <  $data['rooms']){
            return redirect('/admin/bookings')->with('failed', 'Sorry, the room you searched is currently unavailable, please adjust your specifications and try again');
        }
        else {


            Booking::create([
                'user_id' => $data['guest'],
                'room' => $data['room'],
                'checkin' => $checkin,
                'checkout' => $checkout,
                'num_of_rooms' => $data['rooms'],
                'amount' => $data['amount'],
                'payment_status' => $payment_status,
                'created_at' => $now,
                'order_status' => $order_status,
                'posted' => $posted,
                'ref_num' => 'Booked by ' . Auth::User()->first_name . ' ' . Auth::User()->last_name,
                'raveref' => 'Booked by ' . Auth::User()->first_name . ' ' . Auth::User()->last_name,
            ]);

        }

        return back()->with('success', 'Reservation Successfully Booked');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request, $id)
    {
        Booking::where('id', $id)->update([
            'posted' => 'Yes',
        ]);

        return back()->with('updated', 'Transaction has been marked as posted!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request, $id)
    {
        Booking::where('id', $id)->update([
            'order_status' => 'Cancelled',
        ]);

        return back()->with('updated', 'Transaction has been marked as posted!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unpay(Request $request, $id)
    {
        Booking::where('id', $id)->update([
            'payment_status' => 'Reversed',
        ]);

        return back()->with('updated', 'Transaction has been marked as posted!');

    }

}
