<?php

use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Client/MainPage');
})->name('mainpage');

Route::get('/okolica-i-atrakcje', function () {
    return Inertia::render('Client/Atractions');
})->name('atractions');

Route::get('/pszczelarstwo', function () {
    return Inertia::render('Client/Beekeeping');
})->name('beekeeping');

Route::get('/galeria', function () {
    return Inertia::render('Client/Gallery');
})->name('gallery');


Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');

    Route::get('admin/photo', [PhotoController::class, 'index'])->name('photo.index');
    Route::post('admin/photo', [PhotoController::class, 'create'])->name('photo.create');
});


require __DIR__ . '/auth.php';
