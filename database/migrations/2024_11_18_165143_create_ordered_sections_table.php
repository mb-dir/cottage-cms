<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ordered_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained(); // Links to the `pages` table
            $table->morphs('sectionable');
            $table->integer('order'); // The position of the section
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordered_sections');
    }
};
