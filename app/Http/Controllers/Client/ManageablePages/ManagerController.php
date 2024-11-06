<?php

namespace App\Http\Controllers\Client\ManageablePages;


use App\Enums\Page;
use App\Http\Controllers\Controller;
use App\Models\ContentSection;
use App\Models\GallerySection;
use App\Models\Photo;
use Inertia\Inertia;


class ManagerController extends Controller
{
    public function about()
    {
        $contentSections = ContentSection::where('page_id', Page::MainPage->value)->get();

        return Inertia::render('Client/ManageablePages/MainPage', compact('contentSections'));
    }


    public function attractions()
    {
        $contentSections = ContentSection::where('page_id', Page::Attractions->value)->get();

        return Inertia::render('Client/ManageablePages/Attractions', compact('contentSections'));
    }


    public function beekeeping()
    {
        $contentSections = ContentSection::where('page_id', Page::Beekeeping->value)->get();


        return Inertia::render('Client/ManageablePages/Beekeeping', compact('contentSections'));
    }


    public function contact()
    {
        $contentSections = ContentSection::where('page_id', Page::Contact->value)->get();


        return Inertia::render('Client/ManageablePages/Contact', compact('contentSections'));
    }


    public function gallery()
    {
        $photos = Photo::all();
        $gallerySections = GallerySection::all()->where('page_id', Page::Gallery->value)->load('page')->load('photos');


        return Inertia::render('Client/ManageablePages/Gallery', compact('photos', 'gallerySections'));
    }
}
