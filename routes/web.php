<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginPController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

Route::get('/Home', function () {
    return view('Home'); // Make sure the view 'home' exists in your resources/views directory
})->name('Home')->middleware('auth');

Route::get('/login', function () {
    return view('LoginForm');
})->name('login');
//
Route::post('/login', [LoginPController::class, 'authenticate']);
//
// Route::get('/logout', [LogoutController::class, 'index'])->name('logout')->middleware('auth');

Route::get('/', function () {
    return view('LoginForm');
});
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DisponibiliteProfController;
use App\Http\Controllers\ModulePController;

// Profile route

// Disponibilite route
Route::get('/dispo', [DisponibiliteProfController::class, 'index'])->name('dispo')->middleware('auth');

// Module route
Route::get('/module', [ModulePController::class, 'index'])->name('module')->middleware('auth');

// You can add more routes similarly
use App\Http\Controllers\EmploiPController;
use App\Http\Controllers\LogoutController;




// Emploi route
Route::get('/emploi', [EmploiPController::class, 'index'])->name('emploi')->middleware('auth');



// Route to handle password changes
Route::middleware(['web'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/updateProfile', [ProfileController::class, 'update'])->name('updateProfile');
    Route::post('/changePassword', [ProfileController::class, 'changePassword'])->name('changePassword');
});
Route::post('/dispo/store', [DisponibiliteProfController::class, 'store'])->name('dispo.store');
Route::post('/dispo/update', [DisponibiliteProfController::class, 'update'])->name('dispo.update');
use App\Http\Controllers\ProfesseurController;

Route::post('/professeurs', [ProfesseurController::class, 'store']);
use App\Http\Controllers\ModuleSelectController;
Route::post('/module/store', [ModuleSelectController::class, 'store'])->name('module.store');
