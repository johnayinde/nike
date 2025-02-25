<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
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
        if(Auth::user()->is_admin == 1){
            $admins = User::where('is_admin', '!=', Null)->get()->sortByDesc('id');
            return view('admin.admin', compact('admins'));
        }
        elseif(Auth::user()->is_admin == 2){
            return redirect('admin.home')->with('warning', 'done');
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $request->validate([
            'last_name' => ['required', 'string', 'max:25', 'alpha', 'min:3'],
            'first_name' => ['required', 'string', 'max:25', 'alpha', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'level' => ['string', 'required'],
        ]);

        $data = request()->all();

        $date = date("Y-m-d");
        $time = date("h:i:s");
        $now = $date.' '.$time;
        $phone = '07000000000';

        User::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'email_verified_at' => $now,
            'phone'=> $phone,
            'is_admin' => $data['level'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->back()->with('success', 'Admin successfully registered');
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
    public function show($id)
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

        $validator = Validator::make($request->all(), [
            'last_name' => ['required', 'string', 'max:25', 'alpha', 'min:3'],
            'first_name' => ['required', 'string', 'max:25', 'alpha', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'level' => ['string', 'required'],
        ]);

        $data = request()->all();

        if(isset($data['id']) && $data['id'] != ''){
            $id = $data['id'];
        }
        else{
            $id = 'None';
        }

        if ($validator->fails())
        {
            return back()->with('modal_id', $id)->withErrors($validator)->withInput();
        }


        User::where('id', $id)->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'is_admin' => $data['level'],
        ]);


        return back()->with('updated', 'Admin details updated successfully');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return back()->with('deleted', 'Record deleted successfully');
    }
}
