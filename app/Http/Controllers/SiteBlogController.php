<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use App\Models\Blog;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Str;
use Illuminate\Pagination\LengthAwarePaginator;

class SiteBlogController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $posts = Blog::with(['user'])->orderBy('id', 'desc')->paginate(4); //ensure that the paginate is outermost unless it wont work

        return view('blog', compact('posts'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        $request->validate([
            'id' => ['required', 'string', 'max:9'],
        ]);

        $data = request()->all();

        $id = $data['id'];

        $posts = Blog::where('id', $id)->with(['user'])->orderBy('id', 'desc')->get();

//        $url = URL::route('blog_details') . '#hash';
//        return Redirect::to($url, compact('posts')); // domain.com/welcome#hash

        return view('blog_details', compact('posts'));
    }
}
