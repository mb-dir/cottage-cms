<?php

namespace Database\Seeders;


use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@onet.pl',
        ]);

        Page::factory()->create([
            'name' => 'O nas',
            'route_admin_name' => 'admin.about.index',
            'route_client_name' => 'client.about.index',
        ]);

        Page::factory()->create([
            'name' => 'Okolica i atrakcje',
            'route_admin_name' => 'admin.attractions.index',
            'route_client_name' => null,
            'is_section' => true,
        ]);

        Page::factory()->create([
            'name' => 'Galeria',
            'route_admin_name' => 'admin.photo.index',
            'route_client_name' => 'client.photo.index',
        ]);

        Page::factory()->create([
            'name' => 'Pszczelarstwo',
            'route_admin_name' => 'admin.beekeeping.index',
            'route_client_name' => 'client.beekeeping.index',
        ]);

        Page::factory()->create([
            'name' => 'Kontakt',
            'route_admin_name' => 'admin.contact.index',
            'route_client_name' => 'client.contact.index',
        ]);
    }
}
