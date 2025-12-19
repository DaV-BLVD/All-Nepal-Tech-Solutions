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
        Schema::create('why_choose_us_features', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., "24/7 Technical Support" or "500+"
            $table->string('subtitle')->nullable(); // Used for the stat labels like "Happy Clients"
            $table->enum('type', ['checkpoint', 'stat'])->default('checkpoint');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_us_features');
    }
};
