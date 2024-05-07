<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login'); // Tambahkan definisi rute untuk login

Route::get('profile', [ProfileController::class, 'index'])->name('profile');

Route::resource('employees', EmployeeController::class);

Route::post('/create', [EmployeeController::class, 'create']);

Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

