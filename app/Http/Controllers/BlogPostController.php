<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    /**
     * Display a list of posts.
     * */
    public function index()
    {
        // if(Auth::check()){
        $blogs = BlogPost::all();
        return view('blog.index', compact('blogs'));
        // }
        // return redirect(route('login'));
    }

   


}
