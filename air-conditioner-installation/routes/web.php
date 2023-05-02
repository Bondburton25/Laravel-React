<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\{
    InstallationController,
    InstallationStepController,
    ProjectController
};

use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/installation-steps', [InstallationStepController::class, 'index'])->name('installation-steps');


Route::controller(ProjectController::class)->group(function () {
    Route::resource('/projects', ProjectController::class)->only(['index', 'create', 'store']);
});

Route::controller(InstallationController::class)->group(function () {
    Route::resource('/installations', InstallationController::class)->only(['create']);
});

// Auth::routes(['register' => true]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/auth/line', [LoginController::class, 'redirectToLine']);
Route::get('/auth/line/callback', [LoginController::class, 'handleLineCallback']);