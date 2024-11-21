<?php

namespace App\Http\Controllers\Admin\Sections;


use App\Http\Controllers\Controller;
use App\Models\ContentSection;
use App\Models\OrderedSection;
use Illuminate\Http\Request;


class ContentSectionController extends Controller
{
    public function destroy(ContentSection $contentSection)
    {
        // Remove the corresponding OrderedSection entry
        OrderedSection::where('sectionable_type', ContentSection::class)
            ->where('sectionable_id', $contentSection->id)->first()->delete();

        $contentSection->delete();

        return redirect()->back()->with('message', "Sekcja została usunięta");
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['string', 'required'],
            'content' => ['string', 'required'],
            'page_id' => ['required', 'integer', 'exists:pages,id'],
        ]);

        $contentSection = ContentSection::create($validated);

        OrderedSection::create([
            'page_id' => $validated['page_id'],
            'sectionable_type' => ContentSection::class,
            'sectionable_id' => $contentSection->id,
            'order' => OrderedSection::where('page_id', $validated['page_id'])->max('order') + 1, // Place at the end
        ]);

        return redirect()->back()->with('message', "Nowa sekcja została utworzona");
    }


    public function update(ContentSection $contentSection, Request $request)
    {
        $validated = $request->validate([
            'title' => ['string', 'required'],
            'content' => ['string', 'required'],
        ]);

        $contentSection->update($validated);

        return redirect()->back()->with('message', "Sekcja została zaktualizowana");
    }
}
