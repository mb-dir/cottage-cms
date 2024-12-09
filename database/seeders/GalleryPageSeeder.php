<?php

namespace Database\Seeders;


use App\Models\GallerySection;
use App\Models\OrderedSection;
use App\Models\Photo;
use Illuminate\Database\Seeder;


class GalleryPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gallerySection = GallerySection::factory()->create([
            'page_id' => 3,
            'title' => 'Domek i okolica',
            'content' => '<p>Zdjęcia Chaty i najbliższej okolicy.</p>',
        ]);

        OrderedSection::factory()->create([
            'page_id' => 3,
            'sectionable_type' => GallerySection::class,
            'sectionable_id' => 1,
            'order' => 1,
        ]);


        $photos = Photo::all();

        foreach ($photos as $photo) {
            $gallerySection->photos()->attach($photo->id);
        }
    }
}
