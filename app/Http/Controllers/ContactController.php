<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        // Logic to handle contact form submission can be added here
        return view('contact'); // Assuming you have a view for the contact page
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Mail::to('davidolobo10@gmail.com')->send(new Contact($data));

        // Here you can handle the contact form submission, e.g., send an email or save to database

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Thank you for your message! We will get back to you soon.');
    }
}


