<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\energyInfoController;
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

    Route::get('/energyInfo', [energyInfoController::class, 'index'])->name('energyInfo.index');
    Route::get('/energyInfo', [energyInfoController::class, 'edit'])->name('energyInfo.edit');
    Route::patch('/energyInfo', [energyInfoController::class, 'update'])->name('energyInfo.update');
    Route::delete('/energyInfo', [energyInfoController::class, 'destroy'])->name('energyInfo.destroy');
});

require __DIR__.'/auth.php';
