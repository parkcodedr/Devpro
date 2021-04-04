<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FlutterwaveController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard')->middleware('user');
Route::post('/upload', [UserController::class, 'uploadPhoto'])->name('upload')->middleware('user');

Route::get('/profile', [UserController::class, 'profile'])->middleware('user');
Route::get('/profile/{username}', [UserController::class, 'userPublicProfile']);
Route::get('/profile/{id}/edit', [UserController::class, 'edit'])->middleware('user');
Route::put('/profile', [UserController::class, 'update'])->middleware('user');


Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('admin');

Route::get('/project', [ProjectController::class, 'index'])->name('project')->middleware('user');
Route::get('/project/create', [ProjectController::class, 'create'])->name('project')->middleware('user');
Route::post('/project', [ProjectController::class, 'store'])->name('project')->middleware('user');

Route::get('/plan', [UserController::class, 'plans'])->name('plan')->middleware('user');
Route::get('/success', [FlutterwaveController::class, 'success'])->middleware('user');

// The route that the button calls to initialize payment
Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
// The callback url after a payment
Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');


require __DIR__ . '/auth.php';
