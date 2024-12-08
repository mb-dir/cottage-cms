<?php

namespace Database\Seeders;


use App\Models\ContentSection;
use App\Models\OrderedSection;
use Illuminate\Database\Seeder;


class ContactPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContentSection::factory()->create([
            'page_id' => 5,
            'title' => 'Zarezerwuj Chatę Drwala',
            'content' => '<p>Kontakt pod numerem telefonu: <strong>600 538 513</strong></p>',
        ]);

        OrderedSection::factory()->create([
            'page_id' => 5,
            'sectionable_type' => ContentSection::class,
            'sectionable_id' => 6,
            'order' => 1,
        ]);
    }
}
