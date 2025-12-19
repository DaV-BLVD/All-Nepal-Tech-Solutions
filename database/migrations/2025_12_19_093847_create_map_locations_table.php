<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('map_locations', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // optional: e.g., "Head Office"
            $table->text('iframe_url'); // store full Google Maps iframe URL
            $table->integer('order')->default(0); // for ordering if multiple locations
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('map_locations');
    }
};
