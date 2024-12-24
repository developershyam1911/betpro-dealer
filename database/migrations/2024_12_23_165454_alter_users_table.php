<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('image')->nullable()->after('email');
            $table->string('fb_link')->nullable()->after('image');
            $table->string('insta_link')->nullable()->after('fb_link');
            $table->text('description')->nullable()->after('insta_link');
        });
    }
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['image', 'fb_link', 'insta_link', 'description']);
        });
    }
};