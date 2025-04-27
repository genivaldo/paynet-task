<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// custom routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/api/logout', [AuthController::class, 'logout']);
});

// Public API routes
Route::post('/api/login', [AuthController::class, 'login']);
Route::get('/api/cep/{cep}', [CepController::class, 'show']);