<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('social_links', function (Blueprint $table) {
            $table->id();
            $table->string('platform'); // Twitter, Facebook, Instagram, LinkedIn, etc.
            $table->string('icon');     // FontAwesome class
            $table->string('url');      // Link URL
            $table->integer('order')->default(0); // To sort links
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_links');
    }
};
