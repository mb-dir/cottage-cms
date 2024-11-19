<?php

namespace App\Http\Controllers\Admin\Sections;


use App\Http\Controllers\Controller;
use App\Models\OrderedSection;
use Illuminate\Http\Request;


class OrderedSectionController extends Controller
{
    public function update(Request $request)
    {
        $draggedSectionId = $request->input('draggedSectionId');
        $dropTargetSectionId = $request->input('dropTargetSectionId');

        $section1 = OrderedSection::where('sectionable_id', $draggedSectionId)->first();
        $section2 = OrderedSection::where('sectionable_id', $dropTargetSectionId)->first();

        if (! $section1 || ! $section2) {
            return response()->json(['message' => 'Sections not found'], 404);
        }

        // Swap their order values
        $tempOrder = $section1->order;
        $section1->order = $section2->order;
        $section2->order = $tempOrder;

        // Save changes
        $section1->save();
        $section2->save();

        return redirect()->back()->with('message', 'Kolejnosć sekcji została zmieniona');
    }
}
