<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\appointmentController;
use App\Http\Controllers\hospitalController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\ServicePlanController;

Route::resource('api/service', ServicePlanController::class);

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('appointment')->group(function () {
    Route::get('/', [appointmentController::class, 'index'])->name('app.index');
    Route::get('/create', [appointmentController::class, 'create'])->name('app.create');
    Route::get('/create/store', [appointmentController::class, 'store'])->name('app.store');
});

Route::prefix('hospital')->group(function () {
    Route::get('/', [hospitalController::class, 'index'])->name('hos.index');
});

require __DIR__.'/auth.php';
