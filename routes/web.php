<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedisController;
use App\Http\Controllers\KebakaranController;
use App\Http\Controllers\PencurianController;

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
    Route::delete('/medis/{id}', [MedisController::class, 'delete'])->name('medis.delete');
    
    // Routes untuk Kebakaran
    Route::get('/kebakaran/create', [KebakaranController::class, 'create'])->name('kebakaran.create');
    Route::post('/kebakaran', [KebakaranController::class, 'store'])->name('kebakaran.store');
    Route::delete('/kebakaran/{id}', [KebakaranController::class, 'delete'])->name('kebakaran.delete');
    
    // Routes untuk Pencurian
    Route::get('/pencurian/create', [PencurianController::class, 'create'])->name('pencurian.create');
    Route::post('/pencurian', [PencurianController::class, 'store'])->name('pencurian.store');
    Route::delete('/pencurian/{id}', [PencurianController::class, 'delete'])->name('pencurian.delete');
});

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    // KEBAKARAN
    Route::get('/kebakaran', [KebakaranController::class, 'index'])->name('kebakaran.index');
    Route::put('/kebakaran/{id}', [KebakaranController::class, 'update'])->name('kebakaran.update');
    // MEDIS
    Route::get('/medis', [MedisController::class, 'index'])->name('medis.index');
    Route::put('/medis/{id}', [MedisController::class, 'update'])->name('medis.update');
    // PENCURIAN
    Route::get('/pencurian', [PencurianController::class, 'index'])->name('pencurian.index');
    Route::put('/pencurian/{id}', [PencurianController::class, 'update'])->name('pencurian.update');
});

Route::group(['middleware' => ['auth', 'role:User']], function () {
    Route::get('/kebakaranU', [KebakaranController::class, 'indexU'])->name('kebakaran.indexU');
    Route::get('/medisU', [MedisController::class, 'indexU'])->name('medis.indexU');
    Route::get('/pencurianU', [PencurianController::class, 'indexU'])->name('pencurian.indexU');
});
