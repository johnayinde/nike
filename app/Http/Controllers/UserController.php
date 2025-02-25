<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin != Null){

            return view('admin.profile');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails())
        {
            $id = 'user_info';
            return back()->with('modal_id', $id)->withErrors($validator)->withInput();
        }

        $data = request()->all();

        $id = Auth::User()->id;

        User::where('id', $id)->update([
            'password' => Hash::make($data['password']),
        ]);

        return back()->with('updated', 'Password successfully changed!');
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
    public function update(Request $request)
    {

        if(Auth::user()->is_admin == Null){
            $validator = Validator::make($request->all(), [
                'fname' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[a-zA-Z ]+$/'],
                'lname' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[a-zA-Z ]+$/'],
                'phone' => ['required', 'min:11', 'max:15'],
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);
        }
        else{
            $validator = Validator::make($request->all(), [
                'first_name' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[a-zA-Z ]+$/'],
                'last_name' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[a-zA-Z ]+$/'],
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);
        }


        if ($validator->fails())
        {
            if(Auth::user()->is_admin != Null){
                $id = 'user_info';
            }
            $id = 'profile_modal';
            return back()->with('modal_id', $id)->withErrors($validator)->withInput();
        }

        $data = request()->all();

        $id = Auth::User()->id;

        if(Auth::user()->is_admin != Null){
            User::where('id', $id)->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
            ]);
        }
        else{
            User::where('id', $id)->update([
                'first_name' => $data['fname'],
                'last_name' => $data['lname'],
                'phone' => $data['phone'],
                'email' => $data['email'],
            ]);
        }


        return back()->with('updated', 'Profile successfully updated!');
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
}
