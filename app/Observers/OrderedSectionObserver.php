<?php

namespace App\Observers;


use App\Models\OrderedSection;


class OrderedSectionObserver
{
    /**
     * Handle the OrderedSection "created" event.
     */
    public function created(OrderedSection $orderedSection): void
    {
    }


    /**
     * Handle the OrderedSection "deleted" event.
     */
    public function deleted(OrderedSection $orderedSection): void
    {
        $remainingSections = OrderedSection::where('page_id', $orderedSection->page_id)->orderBy('order')->get();

        foreach ($remainingSections as $index => $section) {
            $section->order = $index + 1;
            $section->save();
        }
    }


    /**
     * Handle the OrderedSection "force deleted" event.
     */
    public function forceDeleted(OrderedSection $orderedSection): void
    {
        //
    }


    /**
     * Handle the OrderedSection "restored" event.
     */
    public function restored(OrderedSection $orderedSection): void
    {
        //
    }


    /**
     * Handle the OrderedSection "updated" event.
     */
    public function updated(OrderedSection $orderedSection): void
    {
        //
    }
}
