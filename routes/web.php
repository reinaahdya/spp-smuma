<?php

use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\TahunAjaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
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

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [RoleController::class, 'index'])->name('admin.dashboard');

    // Tahun Ajaran
    Route::prefix('TahunAjaran')->group(function () {
        Route::get('/', [TahunAjaranController::class, 'index'])->name('admin.tahunAjaran.index');
        Route::get('/create', [TahunAjaranController::class, 'create'])->name('admin.tahunAjaran.create');
        Route::post('/store', [TahunAjaranController::class, 'store'])->name('admin.tahunAjaran.store');
        Route::get('/edit/{id}', [TahunAjaranController::class, 'edit'])->name('admin.tahunAjaran.edit');
        Route::put('/update/{id}', [TahunAjaranController::class, 'update'])->name('admin.tahunAjaran.update');
        Route::delete('/destroy/{id}', [TahunAjaranController::class, 'destroy'])->name('admin.tahunAjaran.destroy');
    });

    // Jurusan
    Route::prefix('jurusan')->group(function () {
        Route::get('/', [JurusanController::class, 'index'])->name('admin.jurusan.index');
        Route::get('/create', [JurusanController::class, 'create'])->name('admin.jurusan.create');
        Route::post('/store', [JurusanController::class, 'store'])->name('admin.jurusan.store');
        Route::get('/edit/{id}', [JurusanController::class, 'edit'])->name('admin.jurusan.edit');
        Route::put('/update/{id}', [JurusanController::class, 'update'])->name('admin.jurusan.update');
        Route::delete('/destroy/{id}', [JurusanController::class, 'destroy'])->name('admin.jurusan.destroy');
    });
});
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/editor', function () {
        return view('editor.dashboard');
    })->name('editor.dashboard');
});
