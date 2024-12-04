<?php

use App\Http\Controllers\Admin\Calendar\CalendarController;
use App\Http\Controllers\Admin\ManageablePages\GalleryController;
use App\Http\Controllers\Admin\ManageablePages\ManagerController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\Sections\ContentSectionController;
use App\Http\Controllers\Admin\Sections\GallerySectionController;
use App\Http\Controllers\Admin\Sections\OrderedSectionController;
use App\Http\Controllers\Client\BeekeepingController;
use App\Http\Controllers\Client\GalleryController as ClientGalleryController;
use App\Http\Middleware\LogoutIfAuthenticated;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [\App\Http\Controllers\Client\ManageablePages\ManagerController::class, 'about'])->name('client.about.index');

Route::get('/okolica-i-atrakcje', [\App\Http\Controllers\Client\ManageablePages\ManagerController::class, 'attractions'])->name('client.attractions.index');

Route::get('/pszczelarstwo', [\App\Http\Controllers\Client\ManageablePages\ManagerController::class, 'beekeeping'])->name('client.beekeeping.index');

Route::get('/galeria', [\App\Http\Controllers\Client\ManageablePages\ManagerController::class, 'gallery'])->name('client.gallery.index');

Route::get('/kontakt', [\App\Http\Controllers\Client\ManageablePages\ManagerController::class, 'contact'])->name('client.contact.index');


Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('admin.dashboard');

    Route::get('admin/photo', [PhotoController::class, 'index'])->name('admin.photo.index');
    Route::post('admin/photo', [PhotoController::class, 'create'])->name('admin.photo.store');
    Route::delete('admin/photo/{photo}', [PhotoController::class, 'destroy'])->name('admin.photo.destroy');

    Route::post('admin/gallery-section', [GallerySectionController::class, 'store'])->name('admin.gallery-section.store');
    Route::delete('admin/gallery-section/{gallerySection}', [GallerySectionController::class, 'destroy'])->name('admin.gallery-section.destroy');
    Route::put('admin/gallery-section/{gallerySection}', [GallerySectionController::class, 'update'])->name('admin.gallery-section.update');

    Route::post('admin/content-section', [ContentSectionController::class, 'store'])->name('admin.content-section.store');
    Route::delete('admin/content-section/{contentSection}', [ContentSectionController::class, 'destroy'])->name('admin.content-section.destroy');
    Route::put('admin/content-section/{contentSection}', [ContentSectionController::class, 'update'])->name('admin.content-section.update');

    Route::put('admin/ordered-section', [OrderedSectionController::class, 'update'])->name('admin.ordered-section-update');

    Route::get('/admin/manageable/attractions', [
        ManagerController::class, 'attractions',
    ])->name('admin.attractions.index');

    Route::get('/admin/manageable/beekeeping', [
        ManagerController::class, 'beekeeping',
    ])->name('admin.beekeeping.index');

    Route::get('/admin/manageable/main-page', [
        ManagerController::class, 'about',
    ])->name('admin.about.index');

    Route::get('/admin/manageable/gallery', [
        ManagerController::class, 'gallery',
    ])->name('admin.gallery.index');

    Route::get('/admin/manageable/contact', [
        ManagerController::class, 'contact',
    ])->name('admin.contact.index');

    Route::post('/admin/calendar', [CalendarController::class, 'store'])->name('admin.calendar.store');
});


require __DIR__ . '/auth.php';
