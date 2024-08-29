<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SantriController;

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

Route::get('/dashboard', [SantriController::class, 'dashboard'])->name('dashboard');

Route::get('/santri/laporan', [SantriController::class, 'generatePDF'])->name('santri.laporan');

Route::middleware('auth', 'admin')->group(function () {
    // Route::get('admin/dashboard', [HomeController::class, 'index']);
    Route::get('admin/santri', [SantriController::class, 'index'])->name('admin/santri');
    Route::get('admin/santri/input', [SantriController::class, 'input'])->name('admin/santri/input');
    Route::post('admin/santri/simpan', [SantriController::class, 'simpan'])->name('admin/santri/simpan');
    Route::get('admin/santri/edit/{id_santri}', [SantriController::class, 'edit'])->name('admin/santri/edit');
    Route::put('admin/santri/edit/{id_santri}', [SantriController::class, 'update'])->name('admin/santri/update');
    Route::get('admin/santri/delete/{id_santri}', [SantriController::class, 'delete'])->name('admin/santri/delete');
});

require __DIR__.'/auth.php';

// Route::get('admin/dashboard', [HomeController::class, 'index']);
// Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware('auth', 'admin');