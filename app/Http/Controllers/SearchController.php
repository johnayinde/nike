<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $request->validate([
            'room' => ['required', 'string', 'max:22', 'min:13'],
            'checkin' => ['required', 'string', 'max:255'],
            'checkout' => ['required', 'string', 'max:255'],
            'rooms' => ['required', 'string', 'max:255'],
        ]);

        $data = request()->all();

        $room = $data['room'];
        $checkin = strtotime($data['checkin']);
        $checkout = strtotime($data['checkout']);
        $rooms = $data['rooms'];

        $result = Booking::where('room','=',$room)->where('checkin','<=',$checkin)->where('checkout','>=',$checkin)->where('checkout','>=',$checkout)->where('checkin','<=',$checkout)->where('order_status','=','Successful')->count  ();


        if($room == 'Superior Room' && (188 - $result) <  $rooms){
            return redirect('/booking')->with('nothing', 'Sorry, the room you searched is currently unavailable, please adjust your specifications and try again');
        }
        elseif($room == 'Superior Room (Double)' && (10 - $result) <  $rooms){
            return redirect('/booking')->with('nothing', 'Sorry, the room you searched is currently unavailable, please adjust your specifications and try again');
        }
        elseif($room == 'Executive Suite' && (9 - $result) <  $rooms){
            return redirect('/booking')->with('nothing', 'Sorry, the room you searched is currently unavailable, please adjust your specifications and try again');
        }
        elseif($room == 'Diplomatic Suite' && (2 - $result) <  $rooms){
            return redirect('/booking')->with('nothing', 'Sorry, the room you searched is currently unavailable, please adjust your specifications and try again');
        }
        elseif($room == 'Presidential Suite' && (1 - $result) <  $rooms){
            return redirect('/booking')->with('nothing', 'Sorry, the room you searched is currently unavailable, please adjust your specifications and try again');
        }
        else{
            return redirect(url()->previous())->with('something', 'Great, the room your searched for is available');
        }

    }

}
