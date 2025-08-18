<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Welcomecontroler;
USE App\Http\Controllers\ContactController;

//Using Closure routes for simplicity
// Route::get('/', function () {
//     return view('welcome');
// });

// Using Controller routes for better organization
Route::get('/', [Welcomecontroler::class,'index']);

//To handle the blog index
Route::get('/blog', [BlogController::class, 'index']);

// To handle single blog post view
Route::get('/blog/single-blog-post', [BlogController::class, 'show']);

// About page uses a Closure for simplicity
Route::get('/about', function () {
    return view('about');
});

// Contact page uses a Controller for better organization
Route::get('/contact', [ContactController::class, 'index']);