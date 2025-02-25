<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class   BlogController extends Controller
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
    public function index(Request $request)
    {
        if (Auth::User()->is_admin != null){
//            $user = Auth::user(); //This gets the current logged in user instance (you cannot do this if you dont define the function in the user model)
//            $gallery = $user->images()->get(); // this will get all the images uploaded by this current user
//            return $gallery[0]->title; //This will return the title of the images fetched from the line just above
            $posts = Blog::with(['user'])->get()->sortByDesc('id'); // This will get the images and the linked uploader with all their details (this is achieved by relating the tables in the Gallery model)
//            return $gallery[0]->user->email .' '. $gallery[0]->title; // This will return the email and the title of the images uploaded by the user from the line just above

            return view('admin.blog', compact('posts'));
        }

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
            'title' => ['required', 'string', 'min:3'],
            'details' => ['required', 'string', 'min:3'],
        ]);

        $data = request()->all();

        $date=date("Y-m-d");
        $time=date("h:i:s");
        $now = $date.' '.$time;

        Blog::create([
            'title' => $data['title'],
            'details' => $data['details'],
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'Post successfully uploaded!');
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
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:35'],
            'details' => ['required', 'string', 'min:3'],
        ]);

        if ($validator->fails())
        {
            return back()->with('modal_id', $id)->withErrors($validator)->withInput();
        }

        $data = request()->all();

        Blog::where('id', $id)->update([
            'title' => $data['title'],
            'details' => $data['details'],
        ]);

        return back()->with('updated', 'Post successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::where('id',$id)->delete();

        return back()->with('deleted', 'Record Deleted');
    }
}
