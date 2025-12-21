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
        Schema::create('home_headers', function (Blueprint $table) {
            $table->id();
            $table->string('badge')->nullable(); // IT Design & Consulting
            $table->string('title'); // Facilitate All Local
            $table->string('title_highlight'); // IT-related Service
            $table->text('description');
            $table->string('button_text')->default('Get Details');
            $table->string('button_link')->default('#');
            // Responsive Images
            $table->string('image_mobile')->nullable();
            $table->string('image_tablet')->nullable();
            $table->string('image_laptop')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
