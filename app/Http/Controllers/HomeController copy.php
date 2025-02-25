<?php

namespace App\Http\Controllers;

use App\User;
use App\Booking;
use App\Contact;
use App\Home;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class HomeController extends Controller
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
        if (Auth::user()->is_admin != Null){
            $count_users = User::where('is_admin', '=', Null)->count();
            $count_bookings = Booking::all()->count();
            $count_unposted = Booking::where('posted', '=', 'No')->where('payment_status', '=', 'paid')->count();
            $count_messages = Contact::all()->count();
            $messages = Contact::limit(10)->orderBy('id', 'desc')->get();
            return view('admin.home')->with(compact('count_users', 'count_messages', 'count_unposted', 'count_bookings', 'messages'));
        }

        return redirect('/booking');

    }
}
