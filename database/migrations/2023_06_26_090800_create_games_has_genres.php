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
        Schema::create('games_has_genres', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("game_id")->references("id")->on("game_listings");
            $table->foreignUuid("genre_id")->references("id")->on("genres");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games_has_genres');
    }
};
