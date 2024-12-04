<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ReservedDay extends Model
{
    protected $fillable = ['date'];


    use HasFactory;
}
