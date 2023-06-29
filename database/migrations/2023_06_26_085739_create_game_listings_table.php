<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('game_listings', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("title")->nullable();
            $table->string("slug")->nullable();
            $table->longText("description")->nullable();
            $table->string("age_rating")->nullable();
            $table->string("thumbnail")->nullable();
            $table->string("video_url")->nullable();
            $table->string("publisher")->nullable();
            $table->string("platform")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_listings');
    }
};
