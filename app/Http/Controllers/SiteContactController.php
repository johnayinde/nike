<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class SiteContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Contact::all()->sortByDesc('id');

        return view('contact', compact('messages'));

        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'first-name' => ['present', 'max:0'],
            'full-name' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[a-zA-Z ]+$/'],
            'phone' => ['required', 'min:11', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255', 'min:2'],
            'message' => ['required', 'string', 'min:3'],
        ]);

        $data = request()->all();

        Contact::create([
            'name' => $data['full-name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ]);

        return back()->with('success', 'Message successfully sent!');
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
