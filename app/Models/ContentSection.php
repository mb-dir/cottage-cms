<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ContentSection extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'content', 'page_id'];


    public function page()
    {
        return $this->belongsTo(Page::class);
    }


    public function sectionable()
    {
        return $this->morphOne(OrderedSection::class, 'sectionable');
    }
}
