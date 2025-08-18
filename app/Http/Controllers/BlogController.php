<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // Logic to retrieve blog posts can be added here
        return view('blog'); // Assuming you have a view for the blog index
    }

    public function show()
    {
        // Logic to retrieve a single blog post by ID can be added here
        return view('single-blog-post'); 
    }
}
