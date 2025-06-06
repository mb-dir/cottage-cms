<?php

namespace App\Http\Controllers\Admin\ManageablePages;


use App\Enums\Page;
use App\Http\Controllers\Controller;
use App\Models\ContentSection;
use App\Models\GallerySection;
use App\Models\OrderedSection;
use App\Models\Page as PageModel;
use App\Models\Photo;
use App\Services\CalendarService;
use Illuminate\Http\Request;
use Inertia\Inertia;


class ManagerController extends Controller
{
    public function about()
    {
        $photos = Photo::all();
        $sections = OrderedSection::where('page_id', Page::MainPage->value)->where('sectionable_type', ContentSection::class)->orderBy('order')->get()->map->full_section;

        $swiperPhotos = PageModel::with('photos')->find(Page::MainPage->value)->photos;

        return Inertia::render('Admin/ManageablePages/MainPage', compact('sections', 'photos', 'swiperPhotos'));
    }


    public function attractions()
    {
        $photos = Photo::all();
        $sections = OrderedSection::where('page_id', Page::Attractions->value)->where('sectionable_type', ContentSection::class)->orderBy('order')->get()->map->full_section;
        $swiperPhotos = PageModel::with('photos')->find(Page::Attractions->value)->photos;


        return Inertia::render('Admin/ManageablePages/Attractions', compact('sections', 'photos', 'swiperPhotos'));
    }


    public function beekeeping()
    {
        $photos = Photo::all();
        $sections = OrderedSection::where('page_id', Page::Beekeeping->value)->where('sectionable_type', ContentSection::class)->orderBy('order')->get()->map->full_section;

        $swiperPhotos = PageModel::with('photos')->find(Page::Beekeeping->value)->photos;


        return Inertia::render('Admin/ManageablePages/Beekeeping', compact('sections', 'photos', 'swiperPhotos'));
    }


    public function contact(CalendarService $calendarService)
    {
        $photos = Photo::all();
        $sections = OrderedSection::where('page_id', Page::Contact->value)->where('sectionable_type', ContentSection::class)->orderBy('order')->get()->map->full_section;

        $swiperPhotos = PageModel::with('photos')->find(Page::Contact->value)->photos;

        $calendar = $calendarService->getCalendar();
        $reservedDays = $calendarService->getReservedDays();


        return Inertia::render('Admin/ManageablePages/Contact', compact('sections', 'calendar', 'reservedDays', 'photos', 'swiperPhotos'));
    }


    public function gallery()
    {
        $photos = Photo::all();
        $sections = OrderedSection::with(['page', 'sectionable.photos'])->where('page_id', Page::Gallery->value)->where('sectionable_type', GallerySection::class)->orderBy('order')->get()->map->full_section;

        $swiperPhotos = PageModel::with('photos')->find(Page::Gallery->value)->photos;


        return Inertia::render('Admin/ManageablePages/Gallery', compact('photos', 'sections', 'swiperPhotos'));
    }


    public function storeSwiperPhotos(Request $request)
    {
        $photos = $request->input('photos');
        $page_id = $request->input('page_id');

        $page = PageModel::with('photos')->find($page_id);

        $page->photos()->sync(array_column($photos, 'id'));

        return redirect()->back()->with('message', "Swiper został zaktualizowany");
    }
}
