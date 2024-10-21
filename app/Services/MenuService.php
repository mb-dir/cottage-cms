<?php

namespace App\Services;


use App\Models\Page;


class MenuService
{
    public function getAdminMenu()
    {
        return Page::all();
    }


    public function getClientMenu()
    {
        return Page::all(['name', 'route_client_name']);
    }
}