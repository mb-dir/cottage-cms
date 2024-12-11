<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Page extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'route_admin_name', 'route_client_name'];


    // Main swiper photos
    public function photos()
    {
        return $this->belongsToMany(Photo::class, 'pages_photos');
    }
}
