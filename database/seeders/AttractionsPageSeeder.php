<?php

namespace Database\Seeders;


use App\Models\ContentSection;
use App\Models\OrderedSection;
use Illuminate\Database\Seeder;


class AttractionsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContentSection::factory()->create([
            'page_id' => 2,
            'title' => 'Na miejscu',
            'content' => '<p>Brzeziny to wieś w Polsce położona w województwie podkarpackim, w powiecie ropczycko-sędziszowskim, w gminie Wielopole Skrzyńskie. Obwód wsi wynosi ok. 30 km - jest to jedna z największych wsi w Polsce. Nasz domek znajduje się w przysiółku Brzeziny-Berdechów. Gospodarstwo położone jest pośród lasów. Grzybobranie, wycieczki rowerowe czy po prostu leśne spacery to doskonała forma aktywnego wypoczynku. Po takim pełnym wrażeń dniu, przyjemnie będzie rozpalić ognisko, smakować pyszne kiełbaski i wsłuchiwać się w dźwieki okolicznej przyrody.</p>',
        ]);

        OrderedSection::factory()->create([
            'page_id' => 2,
            'sectionable_type' => ContentSection::class,
            'sectionable_id' => 3,
            'order' => 1,
        ]);

        ContentSection::factory()->create([
            'page_id' => 2,
            'title' => 'Bliższa i dalsza okolica',
            'content' => '<p>Oto lista miejsc, które warto odwiedzić przy okazji pobytu w naszym domku:</p><ul><li>Zabytkowy kościół parafialny pw. św Mikołaja w Brzezinach (5km)</li><li>Czarnorzecko - Strzyżowski park krajobrazowy</li><li>Szlak edukacji ekologicznej - na terenie Czarnorzecko - Strzyżowskiego parku krajobrazowego</li><li>Ścieżka przyrodniczo-geologiczna "Góra Chełm" (7km)</li><li>Ścieżka historyczno-przyrodnicza "Schrony" (8km)</li><li>Wyciąg narciarski „pod dziedzicem” w Gogołowie (16km)</li><li>Muzeum Tadeusza Kantora w Wielopolu Skrzyńskim (12km)</li><li>Skansen archeologiczny Karpacka Troja w Trzcinicy k. Jasła (36km)</li><li>Centrum dziedzictwa szkła w Krośnie (36km)</li></ul>',
        ]);

        OrderedSection::factory()->create([
            'page_id' => 2,
            'sectionable_type' => ContentSection::class,
            'sectionable_id' => 4,
            'order' => 2,
        ]);
    }
}
