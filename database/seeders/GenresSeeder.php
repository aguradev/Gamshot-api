<?php

namespace Database\Seeders;

use App\Models\Api\Genres;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres_data = collect([
            "Action",
            "Adventure",
            "Puzzle",
            "Simulation",
            "Sports",
            "Horror",
            "Strategy",
            "RPG",
            "Racing",
            "Open World",
            "Moba",
            "FPS",
            "Survival",
            "Multiplayer"
        ]);

        $genres_data->map(function ($data) {
            Genres::create([
                "name" => $data
            ]);
        });
    }
}
