<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EnergyInfoController;
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

    Route::get('energyInfo', [EnergyInfoController::class, 'index'])->name('energyInfo.index');
    Route::get('energyInfo/create', [EnergyInfoController::class, 'create'])->name('energyInfo.create');
    Route::post('energyInfo', [EnergyInfoController::class, 'store'])->name('energyInfo.store');
    Route::get('energyInfo/{energyInfo}', [EnergyInfoController::class, 'show'])->name('energyInfo.show');
    Route::get('energyInfo/{energyInfo}/edit', [EnergyInfoController::class, 'edit'])->name('energyInfo.edit');
    Route::put('energyInfo/{energyInfo}', [EnergyInfoController::class, 'update'])->name('energyInfo.update');
    Route::delete('energyInfo/{energyInfo}', [EnergyInfoController::class, 'destroy'])->name('energyInfo.destroy');
});

require __DIR__.'/auth.php';
