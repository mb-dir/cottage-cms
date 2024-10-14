<?php

use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Client/MainPage');
})->name('client.about.index');

Route::get('/okolica-i-atrakcje', function () {
    return Inertia::render('Client/Atractions');
})->name('client.attractions.index');

Route::get('/pszczelarstwo', function () {
    return Inertia::render('Client/Beekeeping');
})->name('client.beekeeping.index');

Route::get('/galeria', function () {
    return Inertia::render('Client/Gallery');
})->name('client.photo.index');

Route::get('/kontakt', function () {
    return Inertia::render('Client/Contact');
})->name('client.contact.index');


Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');

    Route::get('admin/photo', [PhotoController::class, 'index'])->name('photo.index');
    Route::post('admin/photo', [PhotoController::class, 'create'])->name('photo.create');
});


require __DIR__ . '/auth.php';
