<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication AS AuthController;
use App\Http\Controllers\User AS UserController;

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

Route::get('/', [AuthController\ViewAuthController::class, 'index'])->middleware("guest");
Route::get('/logout', [AuthController\ViewAuthController::class, 'logout'])->name('logout');

Route::name('google.')->prefix('google')->group(function(){
    Route::get('/', [AuthController\GoogleController::class, 'redirectToGoogle'])->name('actions');
    Route::get('/callback', [AuthController\GoogleController::class, 'Handlecallback'])->name('callback');
});


Route::name('dashboard.')->prefix('dashboard')->group(function(){
    Route::get('/', [UserController\DashboardController::class, 'index'])->name('index');
});

