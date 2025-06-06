<?php

namespace App\Http\Controllers\Admin\Sections;


use App\Http\Controllers\Controller;
use App\Models\GallerySection;
use App\Models\OrderedSection;
use Illuminate\Http\Request;


class GallerySectionController extends Controller
{
    public function destroy(GallerySection $gallerySection)
    {
        // Remove the corresponding OrderedSection entry
        OrderedSection::where('sectionable_type', GallerySection::class)
            ->where('sectionable_id', $gallerySection->id)->first()
            ->delete();

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

        // Add an entry in the OrderedSection table
        OrderedSection::create([
            'page_id' => $validated['page_id'],
            'sectionable_type' => GallerySection::class,
            'sectionable_id' => $gallerySection->id,
            'order' => OrderedSection::where('page_id', $validated['page_id'])->max('order') + 1, // Place at the end
        ]);

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
