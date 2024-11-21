<?php

namespace App\Models;


use App\Observers\OrderedSectionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


#[ObservedBy([OrderedSectionObserver::class])]
class OrderedSection extends Model
{
    use HasFactory;


    protected $fillable = [
        'page_id',
        'sectionable_type',
        'sectionable_id',
        'order',
    ];


    public function getFullSectionAttribute()
    {
        $sectionable = $this->sectionable;

        if (! $sectionable) {
            return null; // Handle cases where sectionable might not exist
        }

        return [
            'id' => $sectionable->id,
            'title' => $sectionable->title,
            'content' => $sectionable->content,
            'page_id' => $sectionable->page_id,
            'created_at' => $sectionable->created_at,
            'updated_at' => $sectionable->updated_at,
            'type' => ltrim(strrchr($this->sectionable_type, '\\'), '\\'),
            'photos' => $sectionable->photos,
        ];
    }


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
