<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HomePController extends Controller
{
    public function index()
    {
        return view('home');
    }
}