<?php
namespace App\Http\WelcomeController;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Welcomecontroler extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
