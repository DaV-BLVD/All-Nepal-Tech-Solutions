<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contact_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');           // Card title
            $table->string('icon');            // FontAwesome icon class
            $table->text('line1')->nullable(); // First line of text
            $table->text('line2')->nullable(); // Second line of text
            $table->integer('order')->default(0); // To sort cards
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_cards');
    }
};
