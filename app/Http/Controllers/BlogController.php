<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        // Logic to retrieve blog posts can be added here
        return view('blogPost.blog'); // Assuming you have a view for the blog index
    }

    public function show()
    {
        // Logic to retrieve a single blog post by ID can be added here
        return view('blogPost.single-blog-post'); 
    }
    public function create()
    {
        // Logic to show the form for creating a new blog post can be added here
        return view('blogPost.create'); // Assuming you have a view for creating a post
    }

    public function store(Request $request)
    {
        // Logic to handle the form submission for creating a new blog post can be added here
        // Validate and save the post data
        $data = $request->validate([
            'title' => 'required|string|max:255',
            // 'slug' => 'required|string|max:255|unique:posts,slug',
            // 'user_id' => 'required|exists:users,id',
            'imagePath' => 'nullable|image|max:2048',
            'body' => 'required|string',
        ]);

        Post::create($data);

        return redirect()->route('blogPost.index')->with('success', 'Post created successfully!');
    }
}
