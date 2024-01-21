<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Support\Facades\App;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    /**
     * Display a list of posts.
     */
    public function index()
    {
        $locale = App::getLocale();

        $blogs = BlogPost::orderBy('date', 'desc')->paginate(10);

        if ($locale == 'fr') {
            foreach ($blogs as $blogPost) {
                $blogPost->title = $blogPost->title_fr;
                $blogPost->content = $blogPost->content_fr;
            }
        }

        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:45',
            'content' => 'required|min:3|max:5000',
            'title_fr' => 'required|min:3|max:45',
            'content_fr' => 'required|min:3|max:5000',
        ]);

        // $newBlog = new BlogPost;
        // $newBlog->fill($request->all());
        // $newBlog->user_id = Auth::id();
        // $newBlog->save();
        // return $newBlog;

        $newBlog = BlogPost::create([
            'title' => $request->title,
            'content' => $request->content,
            'title_fr' => $request->title_fr,
            'content_fr' => $request->content_fr,
            'date' => now(),
            'user_id' => Auth::user()->id,
        ]);

        return redirect(route('blog.show', $newBlog->id))->withSuccess(trans('success_blog'));
    }


    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        $locale = App::getLocale();

        if ($locale == 'fr') {
            $blogPost->title = $blogPost->title_fr;
            $blogPost->content = $blogPost->content_fr;
        }

        return view('blog.show', compact('blogPost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
        return view('blog.edit', compact('blogPost'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:45',
            'content' => 'required|min:3|max:5000',
            'title_fr' => 'required|min:3|max:45',
            'content_fr' => 'required|min:3|max:5000',
        ]);

        $blogPost->update($validatedData);
        $blogPost->save();

        return redirect(route('blog.show', $blogPost->id))->withSuccess('Article modifié avec succès');
    }

    public function destroy(BlogPost $blogPost)
    {
        $studentId = $blogPost->user_id; 
        $blogPost->delete();

        return redirect(route('students.show', $studentId))->withSuccess('Article supprimé avec succès');
    }
}
