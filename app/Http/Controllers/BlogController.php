<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;


use function Pest\Laravel\post;

use App\Http\Controllers\Controller;

class BlogController extends \App\Http\Controllers\Controller
{

    // Middleware to ensure only authenticated users can access create and store methods. 
    // If create and store are not specified, then all the methods will have to pass through the auth middleware.
    // public function __construct()
    // {
    //     $this->middleware('auth')->only(['create', 'store', show]);
    // }


    public function index(Request $request)
    {
        if ($request->search) {
           
            $posts = Post::where('title', 'like', '%'.$request->search.'%')
                ->orWhere('body', 'like', '%'.$request->search.'%')
                ->latest()
                ->paginate(8);
        } elseif ($request->category) 
        {
            $posts = Category::where('name', $request->category)
            ->firstOrFail()
            ->posts()
            ->paginate(4)
            ->withQueryString();

        }
        else {
            $posts = Post::latest()->paginate(8);
       }
        // Logic to retrieve blog posts can be added here
        // $posts = Post::latest()->get(); // Example: Retrieve all posts

        // Get all categories
        $categories = Category::all();
        return view('blogPost.blog', compact('posts', 'categories')); // Assuming you have a view for the blog index
       
    }

    // public function show($slug)
    // {
    //    $post = Post::where('slug', $slug)->first();
    //     return view('blogPost.single-blog-post', compact('post'));
    // }

   //Route Model Binding
    public function show(Post $post)
    {
        $category = $post->category; // Access the category of the post using the relationship
        // Now you can use $category as needed, for example, pass it to the view
       
        $relatedPosts = $category->posts()->where('id', '!=', $post->id)->latest()->take(3)->get();
        return view('blogPost.single-blog-post', compact('post', 'relatedPosts'));
    }


    public function create()
    {
        // Logic to show the form for creating a new blog post can be added here
        $categories = Category::all();
        return view('blogPost.create', compact('categories')); // Assuming you have a view for creating a post
    }

    public function store(Request $request)
    {
        // Logic to handle the form submission for creating a new blog post can be added here
        // Validate and save the post data
        $data = $request->validate([
            'title' => 'required|string|max:255',
            // 'slug' => 'required|string|max:255|unique:posts,slug',
            // 'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
            'category_id' => 'required',
            'body' => 'required|string',
        ],[
            'image.image' => 'The file must upload an image.', // Custom message for image rule
            'image.mimes' => 'Only jpeg, png, jpg, gif, svg formats are allowed.', // Optional
            'category_id.required' => 'Please Select the Post Category.',
        ]);

        if(Post::latest()->first()!==null){
            $postId = Post::latest()->take(1)->first()->id + 1;
        } else {
            $postId = 1; // If no posts exist, start with ID 1
        }
        
        // Get the latest post ID and increment by 1 for new post

        $title = $request->input('title');
        $category_id = $request->input('category_id');
        $slug = Str::slug($title, '-') . "-" . $postId; // Generate slug from title
        $user_id = Auth::user()->id;       
        $body = $request->input('body'); 

        // Handle image upload
       $imagePath = 'storage/'.$request->file('image')->store('postsImages', 'public');

       $post = new Post();
         $post->title = $title;
         $post->category_id = $category_id;
         $post->slug = $slug;
         $post->user_id = $user_id;
         $post->body = $body;   
         $post->imagePath = $imagePath;

        $post->save();
        // Redirect or return a response after saving the post
        return redirect()->back()->with('status', 'Post created successfully!');

        //return redirect()->route('blogPost.index')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        if (Auth::user()->id !== $post->user_id) {
            // return redirect()->route('blog.index')->with('error', 'You are not authorized to edit this post.');
            Abort(403, 'Unauthorized action.');
        }
        $categories = Category::all();
        return view('blogPost.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    
    {
       if (Auth::user()->id !== $post->user_id) {
            // return redirect()->route('blog.index')->with('error', 'You are not authorized to edit this post.');
            Abort(403, 'Unauthorized action.');
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            // 'slug' => 'required|string|max:255|unique:posts,slug',
            // 'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
            'category_id' => 'required',
            'body' => 'required|string',
        ],[
            'image.image' => 'The file must upload an image.', // Custom message for image rule
            'image.mimes' => 'Only jpeg, png, jpg, gif, svg formats are allowed.', // Optional
            'category_id.required' => 'Please Select the Post Category.',
        ]);

        $title = $request->input('title');
        $category_id = $request->input('category_id');
        $slug = Str::slug($title);  
        $body = $request->input('body'); 

        // Handle image upload
       $imagePath = 'storage/'.$request->file('image')->store('postsImages', 'public');

         $post->title = $title;
         $post->category_id = $category_id;
         $post->slug = $slug;
         $post->body = $body;   
         $post->imagePath = $imagePath;

        $post->save();
        // Redirect or return a response after saving the post
        return redirect()->back()->with('status', 'Post Updated successfully!');

        //return redirect()->route('blogPost.index')->with('success', 'Post created successfully!');
    }
    public function destroy(Post $post)
    {
        if (Auth::user()->id !== $post->user_id) {
            // return redirect()->route('blog.index')->with('error', 'You are not authorized to delete this post.');
            Abort(403, 'Unauthorized action.');
        
        }

        $post->delete();
        return redirect()->back()->with('status', 'Post deleted successfully.');
    }
}
