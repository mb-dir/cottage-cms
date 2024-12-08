<?php

namespace Database\Seeders;


use App\Models\ContentSection;
use App\Models\OrderedSection;
use Illuminate\Database\Seeder;


class BeekepingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContentSection::factory()->create([
            'page_id' => 4,
            'title' => 'Kochani Goście',
            'content' => '<p>Z racji tego, że nasza rodzina zajmuje się pszczołami od ponad 30 lat jesteśmy w satnie zaoferować Wam rożnego rodzaju dobra oferowane przez pszczoły takie jak:</p><ul><li>Miody (w zależności od pory roku):<ul><li>Miód wielokwiatowy</li><li>Miód spadziowy</li><li>Miód rzepakowy</li><li>Miód akacjowy</li><li>Miód lipowy</li></ul></li><li>Ziołomiody<ul><li>Ziołomiód pokrzywowy</li><li>Ziołomiód z mięty</li><li>Ziołomiód z melisy</li></ul></li><li>Świece woskowe</li></ul>',
        ]);

        OrderedSection::factory()->create([
            'page_id' => 4,
            'sectionable_type' => ContentSection::class,
            'sectionable_id' => 5,
            'order' => 1,
        ]);
    }
}
