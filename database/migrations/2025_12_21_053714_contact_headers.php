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
        Schema::create('contact_headers', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Get In Touch');
            $table->text('description');
            $table->string('support_text')->default('24/7 Support Available');
            $table->string('support_icon')->default('fas fa-headset');
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
