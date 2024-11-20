<?php

namespace App\Http\Controllers\Client\ManageablePages;


use App\Enums\Page;
use App\Http\Controllers\Controller;
use App\Models\ContentSection;
use App\Models\GallerySection;
use App\Models\OrderedSection;
use App\Models\Photo;
use Inertia\Inertia;


class ManagerController extends Controller
{
    public function about()
    {
        $contentSections = OrderedSection::where('page_id', Page::MainPage->value)->where('sectionable_type', ContentSection::class)->orderBy('order')->get()->map->sectionable;

        return Inertia::render('Client/ManageablePages/MainPage', compact('contentSections'));
    }


    public function attractions()
    {
        $contentSections = OrderedSection::where('page_id', Page::Attractions->value)->where('sectionable_type', ContentSection::class)->orderBy('order')->get()->map->sectionable;

        return Inertia::render('Client/ManageablePages/Attractions', compact('contentSections'));
    }


    public function beekeeping()
    {
        $contentSections = OrderedSection::where('page_id', Page::Beekeeping->value)->where('sectionable_type', ContentSection::class)->orderBy('order')->get()->map->sectionable;


        return Inertia::render('Client/ManageablePages/Beekeeping', compact('contentSections'));
    }


    public function contact()
    {
        $contentSections = OrderedSection::where('page_id', Page::Contact->value)->where('sectionable_type', ContentSection::class)->orderBy('order')->get()->map->sectionable;


        return Inertia::render('Client/ManageablePages/Contact', compact('contentSections'));
    }


    public function gallery()
    {
        $photos = Photo::all();
        $gallerySections = OrderedSection::where('page_id', Page::Gallery->value)->where('sectionable_type', GallerySection::class)->orderBy('order')->get()->map->sectionable->load('page')->load('photos');

        return Inertia::render('Client/ManageablePages/Gallery', compact('photos', 'gallerySections'));
    }
}
