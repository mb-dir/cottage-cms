<?php

namespace App\Http\Controllers\Client\ManageablePages;


use App\Enums\Page;
use App\Http\Controllers\Controller;
use App\Models\ContentSection;
use App\Models\GallerySection;
use App\Models\OrderedSection;
use App\Models\Photo;
use App\Services\CalendarService;
use Inertia\Inertia;


class ManagerController extends Controller
{
    public function about()
    {
        $sections = OrderedSection::where('page_id', Page::MainPage->value)->where('sectionable_type', ContentSection::class)->orderBy('order')->get()->map->full_section;

        return Inertia::render('Client/ManageablePages/MainPage', compact('sections'));
    }


    public function attractions()
    {
        $sections = OrderedSection::where('page_id', Page::Attractions->value)->where('sectionable_type', ContentSection::class)->orderBy('order')->get()->map->full_section;

        return Inertia::render('Client/ManageablePages/Attractions', compact('sections'));
    }


    public function beekeeping()
    {
        $sections = OrderedSection::where('page_id', Page::Beekeeping->value)->where('sectionable_type', ContentSection::class)->orderBy('order')->get()->map->full_section;


        return Inertia::render('Client/ManageablePages/Beekeeping', compact('sections'));
    }


    public function contact(CalendarService $calendarService)
    {
        $sections = OrderedSection::where('page_id', Page::Contact->value)->where('sectionable_type', ContentSection::class)->orderBy('order')->get()->map->full_section;

        $calendar = $calendarService->getCalendar();

        return Inertia::render('Client/ManageablePages/Contact', compact('sections', 'calendar'));
    }


    public function gallery()
    {
        $photos = Photo::all();
        $sections = OrderedSection::with(['page', 'sectionable.photos'])->where('page_id', Page::Gallery->value)->where('sectionable_type', GallerySection::class)->orderBy('order')->get()->map->full_section;

        return Inertia::render('Client/ManageablePages/Gallery', compact('photos', 'sections'));
    }
}
