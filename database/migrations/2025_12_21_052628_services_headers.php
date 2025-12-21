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
        Schema::create('service_headers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('highlighted_text'); // "Tech Solutions"
            $table->text('description');
            $table->string('bg_icon')->default('fas fa-cogs');
            $table->string('btn_primary_text')->default('Explore Services');
            $table->string('btn_primary_link')->default('#services-grid');
            $table->string('btn_secondary_text')->default('Contact Us');
            $table->string('btn_secondary_link')->default('#contact');
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
