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
        Schema::create('company_statements', function (Blueprint $table) {
            $table->id();
            $table->text('mission_text');
            $table->json('mission_points'); // Stores the bullet points
            $table->text('vision_text');
            $table->json('vision_points'); // Stores the bullet points
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_statements');
    }
};
