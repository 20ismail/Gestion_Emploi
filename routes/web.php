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
use App\Http\Controllers\ModulePrefereController;

Route::post('/module/store', [ModulePrefereController::class, 'store'])->name('module.store');

Route::get('/activite', [ModulePrefereController::class, 'showActivities'])->name('activities');
// Route::post('/module-prefere/store', [ModulePrefereController::class, 'store'])->name('moduleprefere.store');

// Route pour afficher les activités ajoutées par le professeur
// Route::get('/activities', [ModulePrefereController::class, 'showActivities'])->name('activities');
use App\Http\Controllers\ModuleController;

// routes/web.php

Route::get('/getFilieres', [ModulePrefereController::class, 'getFilieres'])->name('getFilieres');
Route::get('/getSemestres', [ModulePrefereController::class, 'getSemestres'])->name('getSemestres');
Route::get('/getModules', [ModulePrefereController::class, 'getModules'])->name('getModules');
Route::get('/getGroupes', [ModulePrefereController::class, 'getGroupes'])->name('getGroupes');
Route::get('/get-groupes-rester', [ModulePrefereController::class, 'getGroupesRester'])->name('getGroupesRester');
Route::get('/path-to-get-group-data', [ModulePrefereController::class, 'getGroupData'])->name('getGroupData');
// Route::get('/calculateAndUpdateHours', [ModulePrefereController::class, 'calculateAndUpdateHours'])->name('calculateAndUpdateHours');
Route::get('/fetch-activity-data/{type}', [ModulePrefereController::class, 'fetchData'])->name('fetchData');
Route::post('/test/insert', [ModulePrefereController::class, 'insert'])->name('test.insert');
Route::get('/test', [ModulePrefereController::class, 'test'])->name('test')->middleware('auth');
Route::get('/get-rest-groupe', [ModulePrefereController::class, 'getRestGroupe'])->name('getRestGroupe');
Route::get('/test', [ModulePrefereController::class, 'showForm'])->name('test')->middleware('auth');
use App\Http\Controllers\ActiviteController;

Route::post('/activities/delete', [ActiviteController::class, 'deleteActivities'])->name('activities.delete');