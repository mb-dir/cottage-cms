<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Models\ContentSection;
use Inertia\Inertia;


class BeekeepingController extends Controller
{
    public function index()
    {
        $contentSections = ContentSection::all();

        return Inertia::render('Client/Gallery', compact('contentSections'));
    }
}
