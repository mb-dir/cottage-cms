<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Photo;
use Inertia\Inertia;


class GalleryController extends Controller
{
    public function index()
    {
        $photos = Photo::all();

        return Inertia::render('Admin/ManageablePages/Gallery', compact('photos'));
    }
}
