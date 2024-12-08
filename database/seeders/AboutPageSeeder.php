<?php

namespace Database\Seeders;


use App\Models\ContentSection;
use App\Models\OrderedSection;
use Illuminate\Database\Seeder;


class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContentSection::factory()->create([
            'page_id' => 1,
            'title' => 'Kochani Goście',
            'content' => "<p>Bardzo dziękujemy za odwiedzenie naszej strony internetowej. Gospodarstwo Agroturystyczne 'Chata Drwala' znajduje się w cudownej wiosce Brzeziny niedaleko Ropczyc, w woj. podkarpackim. To zdaniem naszych dotychczasowych Gości, najpiękniejsze miejsce w okolicy. Nasz całoroczny drewniany domek, położony z dala od głównej drogi, otoczony lasem i dziką przyrodą, gwarantuje ciszę, wypoczynek i upragniony spokój. Spędzisz u nas fantastyczny czas z ukochaną osobą, w gronie rodziny oraz przyjaciół. Ranek powita Cię śpiewem ptaków oraz szumem drzew, a na łące spotkasz pasące się sarny i zające. Wieczór to idealny moment na rozpalenie ogniska - pieczone kiełbaski będą pysznym dodatkiem do wspólnie spędzanego czasu. Zimowe noce z pewnością rozgrzeje żar z naszego kominka. Oferujemy wygodne miejsca noclegowe dla sześciu osób oraz pełne wyposażenie domku. Po szczegóły zapraszamy do kolejnych zakładek. Drogi Gościu, serdecznie zapraszamy Cię w nasze strony!</p>",
        ]);

        OrderedSection::factory()->create([
            'page_id' => 1,
            'sectionable_type' => ContentSection::class,
            'sectionable_id' => 1,
            'order' => 1,
        ]);

        ContentSection::factory()->create([
            'page_id' => 1,
            'title' => 'Nasz Domek',
            'content' => "<p>Naszym priorytetem jest zapewnienie Gościom wysokiego standardu dlatego bardzo dbamy o to, aby w domku zawsze było czysto. Cena uzależniona jest od pory roku, liczby Gości oraz długości pobytu. Przy dłuższym pobycie przewidujemy możliwość indywidualnej negocjacji ceny. Przy domku znajduje się miejsce parkingowe dla kilku samochodów. Naszym Gościom oferujemy:</p><ul><li>6 miejsc noclegowych(dwuosobowa, rozkładana sofa + 4 jednoosobowe łóżka możliwe do połączenia)</li><li>Łazienka<ul><li>Prysznic</li><li>WC</li><li>Bidet</li><li>Umywalka</li><li>Szafka z lustrem</li></ul></li><li>Aneks kuchenny<ul><li>Kuchenka gazowa</li><li>Lodówka</li><li>Zlewozmywak</li><li>Naczynia</li><li>Sztućce</li><li>Kubki, szklani i kieliszki</li><li>Radio</li></ul></li><li>Duży, drewniany stół z krzesłami</li><li>Kominek</li><li>Taras z ławką, stołem i krzesłami</li><li>Miejsce na ognisko/grill</li></ul>",
        ]);

        OrderedSection::factory()->create([
            'page_id' => 1,
            'sectionable_type' => ContentSection::class,
            'sectionable_id' => 2,
            'order' => 2,
        ]);
    }
}
