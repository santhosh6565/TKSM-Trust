<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('image_path'); // To store AVIF image paths
            $table->enum('view', ['event','gallery', 'event_and_gallery'])->default('gallery');
            $table->string('location')->nullable(); // To store the location
            $table->json('requirements')->nullable(); // To store requirements as a JSON array
            $table->enum('event_status', ['upcoming', 'planning', 'finished'])->default('upcoming');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
