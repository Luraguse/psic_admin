<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/register', [UserController::class, 'showRegistrationForm']);
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get("/users", [UserController::class, 'index'])->name('users.index');
Route::get("/pacientes", [UserController::class, 'pacientes'])->name('users.pacientes');

# User with ID
Route::get("/users/{id}", [UserController::class, 'view'])->name('users.view');
