<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmploiPController extends Controller
{
    public function index()
    {
        return view('emploi'); // Ensure the 'emploi.blade.php' view exists
    }
}
