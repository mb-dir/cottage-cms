<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Models\Photo;
use Inertia\Inertia;


class GalleryController extends Controller
{
    public function index()
    {
        $photos = Photo::where('is_gallery', 1)->get();

        return Inertia::render('Client/Gallery', compact('photos'));
    }
}
