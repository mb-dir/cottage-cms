<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Client/MainPage');
})->name('mainpage');

Route::get('/okolica-i-atrakcje', function () {
    return Inertia::render('Client/Atractions');
})->name('atractions');

require __DIR__ . '/auth.php';
