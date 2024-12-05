<?php

namespace Database\Seeders;


use App\Models\Page;
use Illuminate\Database\Seeder;


class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::factory()->create([
            'name' => 'O nas',
            'route_admin_name' => 'admin.about.index',
            'route_client_name' => 'client.about.index',
        ]);

        Page::factory()->create([
            'name' => 'Okolica i atrakcje',
            'route_admin_name' => 'admin.attractions.index',
            'route_client_name' => 'client.attractions.index',
        ]);

        Page::factory()->create([
            'name' => 'Galeria',
            'route_admin_name' => 'admin.gallery.index',
            'route_client_name' => 'client.gallery.index',
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
