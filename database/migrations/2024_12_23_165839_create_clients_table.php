<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('clients', callback: function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('description');
            $table->string('fb_link');
            $table->string('insta_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};