<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\GallerySection;
use Illuminate\Http\Request;


class GallerySectionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['string', 'required'],
            'content' => ['string', 'required'],
            'page_id' => ['required', 'integer', 'exists:pages,id'],
        ]);

        GallerySection::create($validated);

        return redirect()->back()->with('message', "Się dodało się");
    }
}
