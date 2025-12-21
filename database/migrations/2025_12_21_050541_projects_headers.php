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
        Schema::create('projects_headers', function (Blueprint $table) {
            $table->id();
            $table->string('badge')->nullable(); // "INNOVATION IN ACTION"
            $table->string('title');             // "Our Masterpieces"
            $table->text('description');         // "Explore how we transform..."
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
