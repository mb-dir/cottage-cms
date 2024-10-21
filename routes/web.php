<?php

use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GallerySectionController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Client\GalleryController as ClientGalleryController;
use App\Http\Middleware\LogoutIfAuthenticated;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::middleware(LogoutIfAuthenticated::class)->group(function () {
    Route::get('/', function () {
        return Inertia::render('Client/MainPage');
    })->name('client.about.index');

    Route::get('/okolica-i-atrakcje', function () {
        return Inertia::render('Client/Attractions');
    })->name('client.attractions.index');

    Route::get('/pszczelarstwo', function () {
        return Inertia::render('Client/Beekeeping');
    })->name('client.beekeeping.index');

    Route::get('/galeria', [ClientGalleryController::class, 'index'])->name('client.gallery.index');

    Route::get('/kontakt', function () {
        return Inertia::render('Client/Contact');
    })->name('client.contact.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('admin.dashboard');

    Route::get('admin/photo', [PhotoController::class, 'index'])->name('admin.photo.index');
    Route::post('admin/photo', [PhotoController::class, 'create'])->name('admin.photo.store');
    Route::delete('admin/photo/{photo}', [PhotoController::class, 'destroy'])->name('admin.photo.destroy');

    Route::post('admin/gallery-section', [GallerySectionController::class, 'store'])->name('admin.gallery-section.store');

    Route::get('/admin/manageable/main-page', function () {
        return Inertia::render('Admin/ManageablePages/MainPage');
    })->name('admin.about.index');

    Route::get('/admin/manageable/attractions', function () {
        return Inertia::render('Admin/ManageablePages/Attractions');
    })->name('admin.attractions.index');

    Route::get('/admin/manageable/beekeeping', function () {
        return Inertia::render('Admin/ManageablePages/Beekeeping');
    })->name('admin.beekeeping.index');

    Route::get('/admin/manageable/gallery', [
        GalleryController::class, 'index',
    ])->name('admin.gallery.index');

    Route::get('/admin/manageable/contact', function () {
        return Inertia::render('Admin/ManageablePages/Contact');
    })->name('admin.contact.index');
});


require __DIR__ . '/auth.php';
