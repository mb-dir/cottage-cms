<?php

namespace App\Services;


use App\Models\Page;


class MenuService
{
    public function getAdminMenu()
    {
        return Page::all(['name', 'route_admin_name']);
    }


    public function getClientMenu()
    {
        return Page::all(['name', 'route_client_name']);
    }
}