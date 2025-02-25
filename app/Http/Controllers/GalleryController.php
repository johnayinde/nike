<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use App\Gallery;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Str;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
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
            $images = Gallery::with(['user'])->get()->sortByDesc('id'); // This will get the images and the linked uploader with all their details (this is achieved by relating the tables in the Gallery model)
//            return $gallery[0]->user->email .' '. $gallery[0]->title; // This will return the email and the title of the images uploaded by the user from the line just above

            return view('admin.gallery', compact('images'));
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
            'title' => ['required', 'string', 'max:35'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:50120'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$request->title.'.'.Str::lower($image->getClientOriginalExtension());
            $path = $image->storeAs('public', $imageName);
        }

        $data = request()->all();

        $date=date("Y-m-d");
        $time=date("h:i:s");
        $now = $date.' '.$time;

        Gallery::create([
            'title' => $data['title'],
            'image' => $imageName, //Passing $data->image as parameter to our created method
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'Image successfully uploaded!');
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
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:10240'],
        ]);

        if ($validator->fails())
        {
            return back()->with('modal_id', $id)->withErrors($validator)->withInput();
        }

        $data = request()->all();

        if ($request->hasFile('image')) {
            File::delete(public_path('admin/uploads/'.$request->old_image));

            $image = $request->file('image');
            $imageName = time().'_'.$request->title.'.'.Str::lower($image->getClientOriginalExtension());
            $path = public_path('admin/uploads/');
            $image->move($path, $imageName);

            Gallery::where('id', $id)->update([
                'title' => $data['title'],
                'image' => $imageName, //Passing $data->image as parameter to our created method
            ]);
        }
        else{
            Gallery::where('id', $id)->update([
                'title' => $data['title'],
            ]);
        }

        return back()->with('updated', 'Image successfully uploaded!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $image)
    {
        File::delete(public_path('admin/uploads/'.$image));
        Gallery::where('id',$id)->delete();

        return back()->with('deleted', 'Record Deleted');
    }
}
