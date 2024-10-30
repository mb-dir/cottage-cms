<?php

namespace App\Http\Controllers\Admin\Sections;


use App\Http\Controllers\Controller;
use App\Models\ContentSection;
use Illuminate\Http\Request;


class ContentSectionController extends Controller
{
    public function destroy(ContentSection $contentSection)
    {
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

        ContentSection::create($validated);

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
