<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity; // Assuming you have an Activity model

class ActiviteController extends Controller
{
    public function index()
    {
        $activities = Activity::all(); // Fetch all activities from the database
        return view('activite', compact('activities'));
    }
}