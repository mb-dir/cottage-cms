<?php

namespace App\Http\Controllers\Admin\Sections;


use App\Http\Controllers\Controller;
use App\Models\GallerySection;
use Illuminate\Http\Request;


class GallerySectionController extends Controller
{
    public function destroy(GallerySection $gallerySection)
    {
        $gallerySection->delete();

        return redirect()->back()->with('message', "Sekcja została usunięta");
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['string', 'required'],
            'content' => ['string', 'required'],
            'photos.*.id' => ['required', 'integer', 'exists:photos,id'],
            'page_id' => ['required', 'integer', 'exists:pages,id'],
        ]);

        $gallerySection = GallerySection::create($validated);
        $gallerySection->photos()->sync(array_column($validated['photos'], 'id'));

        return redirect()->back()->with('message', "Nowa sekcja została utworzona");
    }


    public function update(GallerySection $gallerySection, Request $request)
    {
        $validated = $request->validate([
            'title' => ['string', 'required'],
            'content' => ['string', 'required'],
            'photos' => ['required', 'array'],
            'photos.*.id' => ['required', 'integer', 'exists:photos,id'],
        ]);

        $gallerySection->update($validated);
        $gallerySection->photos()->sync(array_column($validated['photos'], 'id'));

        return redirect()->back()->with('message', "Sekcja została zaktualizowana");
    }
}
