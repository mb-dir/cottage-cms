<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class GallerySection extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'content', 'page_id'];
}
