<?php

namespace Database\Seeders;


use App\Models\AddressInformation;
use Illuminate\Database\Seeder;


class AddressInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AddressInformation::factory()->create([
            'map_src' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d40954.250195388966!2d21.531314!3d49.90484!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473daeca13ee83a3%3A0xafd41f23b31771c6!2sChata%20Drwala!5e1!3m2!1spl!2spl!4v1728032100180!5m2!1spl!2splhttps://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d40954.250195388966!2d21.531314!3d49.90484!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473daeca13ee83a3%3A0xafd41f23b31771c6!2sChata%20Drwala!5e1!3m2!1spl!2spl!4v1728032100180!5m2!1spl!2spl',
            'phone' => 'Gosia tel. 600 538 513',
            'coordinates' => "49°54'17.5''N 21°31'52.5''E",
            'address' => 'Brzeziny 393, 39-111 Brzeziny',
        ]);
    }
}
