<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class OrderedSection extends Model
{
    use HasFactory;


    protected $fillable = [
        'page_id',
        'sectionable_type',
        'sectionable_id',
        'order',
    ];


    /**
     * Define the relationship to the Page model.
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }


    /**
     * Define the polymorphic relationship to sectionable models (ContentSection, GallerySection).
     */
    public function sectionable()
    {
        return $this->morphTo();
    }
}
