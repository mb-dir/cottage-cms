<?php

namespace App\Http\Controllers\Admin\ManageablePages;


use App\Http\Controllers\Controller;
use App\Models\ContentSection;
use App\Models\GallerySection;
use App\Models\Photo;
use Inertia\Inertia;


class ManagerController extends Controller
{
    public function about(string $slug)
    {
        $contentSections = ContentSection::with('page')->where('slug', $slug);
        dd($contentSections);

        return Inertia::render('Admin/ManageablePages/MainPage', compact('contentSections'));
    }


    public function attractions(string $slug)
    {
        $contentSections = ContentSection::with('page')->where('slug', $slug);
        dd($contentSections);

        return Inertia::render('Admin/ManageablePages/Beekeeping', compact('contentSections'));
    }


    public function beekeping(string $slug)
    {
        $contentSections = ContentSection::with('page')->where('slug', $slug);

        return Inertia::render('Admin/ManageablePages/Beekeeping', compact('contentSections'));
    }


    public function contact(string $slug)
    {
        $contentSections = ContentSection::with('page')->where('slug', $slug);
        dd($contentSections);

        return Inertia::render('Admin/ManageablePages/Beekeeping', compact('contentSections'));
    }


    public function gallery(string $slug)
    {
        $photos = Photo::all();
//        $gallerySections = GallerySection::all()->where('slug', $slug)->firstOrFail()->load('photos');
        $gallerySections = GallerySection::with('page')->where('slug', $slug);

        return Inertia::render('Admin/ManageablePages/Gallery', compact('photos', 'gallerySections'));
    }
}
