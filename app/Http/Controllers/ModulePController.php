<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModulePController extends Controller
{
    public function index()
    {
        return view('module'); // Ensure the 'profile.blade.php' view exists
    }
}
