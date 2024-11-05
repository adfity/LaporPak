<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedisController;

Route::get('/', function () {
    return view('welcome');
});

// Routes untuk Login dan Register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth', 'role:Admin,User']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Routes untuk Medis
    Route::get('/medis/create', [MedisController::class, 'create'])->name('medis.create');
    Route::post('/medis', [MedisController::class, 'store'])->name('medis.store');
    Route::get('/medis', [MedisController::class, 'index'])->name('medis.index');
    Route::get('/medis/{id}/edit', [MedisController::class, 'edit'])->name('medis.edit');
    Route::put('/medis/{id}', [MedisController::class, 'update'])->name('medis.update');
    Route::delete('/medis/{id}', [MedisController::class, 'delete'])->name('medis.delete');
});

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    
});

Route::group(['middleware' => ['auth', 'role:User']], function () {
    
});
