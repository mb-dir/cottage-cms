<?php

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

Route::get('/admin/dashboard', function () {
    return Inertia::render('Admin/Dashboard');
})->name('dashboard')->middleware('auth');

require __DIR__ . '/auth.php';
