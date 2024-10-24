<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Models\GallerySection;
use Inertia\Inertia;


class GalleryController extends Controller
{
    public function index()
    {
        $gallerySections = GallerySection::all()->load('photos');

        return Inertia::render('Client/Gallery', compact('gallerySections'));
    }
}
