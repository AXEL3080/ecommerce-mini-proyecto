<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Rutas Públicas
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/nosotros', function () {
    return view('pages.about');
})->name('about');

Route::get('/contacto', function () {
    return view('pages.contact');
})->name('contact');

// Rutas de Autenticación
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Rutas del Cliente
Route::middleware(['auth', 'role:Cliente'])->group(function () {
    Route::get('/cliente/dashboard', function () {
        return view('dashboards.cliente');
    })->name('dashboard.cliente');
});

// Rutas del Empleado
Route::middleware(['auth', 'role:Empleado'])->group(function () {
    Route::get('/empleado/dashboard', function () {
        return view('dashboards.empleado');
    })->name('dashboard.empleado');
});

// Rutas del Gerente (Incluye CRUD de Usuarios)
Route::middleware(['auth', 'role:Gerente'])->group(function () {
    Route::get('/gerente/dashboard', function () {
        return view('dashboards.gerente');
    })->name('dashboard.gerente');

    Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
    Route::delete('/usuarios/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});