<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'admin'])->name('dashboard');
});

route::middleware(['auth', 'user-access:verifikator'])->group(function () {
    Route::get('/verifikator/dashboard', [HomeController::class, 'verifikator'])->name('dashboard');
});
Route::middleware(['auth', 'user-access:approval'])->group(function () {
    Route::get('/approval/dashboard', [HomeController::class, 'approval'])->name('dashboard');
});

route::get('/test', function () {
    return 'User Type: ' . Auth::user()->type;
})->middleware(['auth', 'user-access:verifikator']);
