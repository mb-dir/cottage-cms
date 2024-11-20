<?php

namespace App\Http\Controllers\Admin\Sections;


use App\Http\Controllers\Controller;
use App\Models\ContentSection;
use App\Models\GallerySection;
use App\Models\OrderedSection;
use Illuminate\Http\Request;


class OrderedSectionController extends Controller
{
    public function update(Request $request)
    {
        $draggedSectionType = $request->input('draggedSectionType') === 'ContentSection' ? ContentSection::class : GallerySection::class;
        $dropTargetSectionType = $request->input('dropTargetSectionType') === 'ContentSection' ? ContentSection::class : GallerySection::class;

        // Retrieve the sections
        $sections = OrderedSection::whereIn('sectionable_id', [
            $request->input('draggedSectionId'),
            $request->input('dropTargetSectionId'),
        ])
            ->whereIn('sectionable_type', [$draggedSectionType, $dropTargetSectionType])
            ->get()
            ->keyBy(fn($section) => $section->sectionable_id);

        $section1 = $sections[$request->input('draggedSectionId')] ?? null;
        $section2 = $sections[$request->input('dropTargetSectionId')] ?? null;

        if (! $section1 || ! $section2) {
            return response()->json(['message' => 'Sections not found'], 404);
        }

        // Swap their order values and save
        [$section1->order, $section2->order] = [$section2->order, $section1->order];
        $section1->save();
        $section2->save();

        return redirect()->back()->with('message', 'Kolejność sekcji została zmieniona');
    }
}
