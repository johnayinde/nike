<?php

namespace App\Http\Controllers;

use App\Contact;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::User()->is_admin != null){
            $messages = Contact::all()->sortByDesc('id');

            return view('admin.messages', compact('messages'));
        }

        return redirect('/');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::where('id',$id)->delete();

        return back()->with('deleted', 'Record Deleted');
    }
}
