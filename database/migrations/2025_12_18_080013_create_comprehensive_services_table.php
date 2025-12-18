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
        Schema::create('comprehensive_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable(); // e.g., "Advanced Security"
            $table->text('description');
            $table->string('icon_class'); // For FontAwesome: "fas fa-shield-alt"
            $table->string('link')->default('#');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprehensive_services');
    }
};
