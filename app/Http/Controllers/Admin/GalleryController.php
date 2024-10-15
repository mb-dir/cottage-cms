<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Inertia\Inertia;


class GalleryController extends Controller
{
    public function index()
    {
        $photos = Photo::all();

        return Inertia::render('Admin/ManageablePages/Gallery', compact('photos'));
    }


    public function update(Request $request)
    {
        $photosToAdd = $request->input('photos', null);

        Photo::where('is_gallery', true)->update(['is_gallery' => false]);

        if (! empty($photosToAdd)) {
            Photo::whereIn('id', $photosToAdd)->update(['is_gallery' => true]);
        }

        return redirect()->back();
    }
}
