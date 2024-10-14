<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Photo extends Model
{
    use HasFactory;


    protected $fillable = ['src', 'is_gallery'];


    public function getSrcAttribute($value)
    {
        return Storage::url($value);
    }
}
