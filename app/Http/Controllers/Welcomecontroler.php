<?php
namespace App\Http\WelcomeController;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class Welcomecontroler extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(5)->get();
        return view('welcome', compact('posts'));
    }
}
