<?php
use App\Http\Controllers\Welcomecontroler;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [Welcomecontroler::class,'index'])->name('welcome.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Route for creating a new post
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');

// Route for displaying a single blog post using the slug
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// Edit post Route
Route::get('/blog/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit');

// Update post Route
Route::put('/blog/{post}', [BlogController::class, 'update'])->name('blog.update');

// Update post Route
Route::delete('/blog/{post}', [BlogController::class, 'destroy'])->name('blog.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';