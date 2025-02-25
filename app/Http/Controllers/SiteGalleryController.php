<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Gallery;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Str;
use Illuminate\Pagination\LengthAwarePaginator;

class SiteGalleryController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $images = Gallery::orderBy('id', 'desc')->paginate(6); //ensure that the paginate is outermost unless it wont work
//
        return view('gallery', compact('images'));

    }
}
