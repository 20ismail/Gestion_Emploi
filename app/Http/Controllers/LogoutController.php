<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index()
    {
        return view('login'); // Ensure the 'profile.blade.php' view exists
    }
}
