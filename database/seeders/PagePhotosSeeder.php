<?php

namespace Database\Seeders;


use App\Models\Page;
use App\Models\Photo;
use Illuminate\Database\Seeder;


class PagePhotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = Page::with('photos')->get();
        $photos = Photo::pluck('id')->toArray();

        foreach ($pages as $page) {
            $page->photos()->sync($photos);
        }
    }
}
