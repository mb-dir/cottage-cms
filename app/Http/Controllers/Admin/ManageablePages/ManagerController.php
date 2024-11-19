<?php

namespace App\Http\Controllers\Admin\ManageablePages;


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
        $contentSections = ContentSection::where('page_id', Page::MainPage->value)->get();

        return Inertia::render('Admin/ManageablePages/MainPage', compact('contentSections'));
    }


    public function attractions()
    {
        $contentSections = ContentSection::where('page_id', Page::Attractions->value)->get();

        return Inertia::render('Admin/ManageablePages/Attractions', compact('contentSections'));
    }


    public function beekeeping()
    {
        $contentSections = ContentSection::where('page_id', Page::Beekeeping->value)->get();


        return Inertia::render('Admin/ManageablePages/Beekeeping', compact('contentSections'));
    }


    public function contact()
    {
        $contentSections = OrderedSection::where('page_id', Page::Contact->value)->where('sectionable_type', ContentSection::class)->orderBy('order')->get()->map->sectionable;


        return Inertia::render('Admin/ManageablePages/Contact', compact('contentSections'));
    }


    public function gallery()
    {
        $photos = Photo::all();
        $gallerySections = GallerySection::all()->where('page_id', Page::Gallery->value)->load('page')->load('photos');


        return Inertia::render('Admin/ManageablePages/Gallery', compact('photos', 'gallerySections'));
    }
}
