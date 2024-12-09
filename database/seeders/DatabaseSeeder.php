<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UserSeeder::class, PageSeeder::class, AboutPageSeeder::class, AttractionsPageSeeder::class, BeekepingPageSeeder::class, ContactPageSeeder::class, PhotoSeeder::class, GalleryPageSeeder::class]);
    }
}
