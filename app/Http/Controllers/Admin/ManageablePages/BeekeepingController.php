<?php

namespace App\Http\Controllers\Admin\ManageablePages;


use App\Http\Controllers\Controller;
use App\Models\ContentSection;
use Inertia\Inertia;


class BeekeepingController extends Controller
{
    public function index()
    {
        $contentSections = ContentSection::all();

        return Inertia::render('Admin/ManageablePages/Beekeeping', compact('contentSections'));
    }
}
