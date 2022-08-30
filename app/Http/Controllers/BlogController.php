<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // return all blog posts
    public function index()
    {
        $blogs = Blog::all();

        return view('blog.index', [
            'blogs' => $blogs
        ]);
    }

    // returns single blog post
    public function show($blogId)
    {
        $blog = Blog::find($blogId);

        return view('blog.show', [
            'blog' => $blog
        ]);
    }

    // store blog
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('image', 'public');
        }

        $blog = Blog::create($formFields);

        return redirect()->route('blog.index');
    }
}
