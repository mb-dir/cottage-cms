<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AddressInformation extends Model
{
    use HasFactory;


    protected $fillable = ['map_src', 'address', 'phone', 'coordinates'];
}