<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\GallerySection;
use App\Models\Photo;
use Inertia\Inertia;


class GalleryController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        $gallerySections = GallerySection::all()->load('photos');

        return Inertia::render('Admin/ManageablePages/Gallery', compact('photos', 'gallerySections'));
    }
}
