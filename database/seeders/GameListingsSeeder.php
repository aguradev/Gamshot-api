<?php

namespace Database\Seeders;

use App\Models\Api\GameListings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameListingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_game = collect([
            [
                "title" => "Grand Theft Auto V: Special Edition",
                "description" => "Grand Theft Auto V is the largest and most ambitious game Rockstar Games has yet created, and takes full advantage of every ounce of processing power available in the current generation of consoles. In order to provide the best possible experience for such a massive and detailed world, the game will have installation requirements on the Xbox 360.
                ",
                "age_rating" => "Dewasa +18",
                "thumbnail" => "https://images.igdb.com/igdb/image/upload/t_cover_big/co2nbc.png",
                "video_url" => "https://www.youtube.com/embed/QkkoHAzjnUs",
                "publisher" => "Rockstar Games",
                "platform" => "Playstation"
            ],
            [
                "title" => "The Witcher 3: Wild Hunt - Game of the Year Edition",
                "description" => "Become a professional monster slayer and embark on an adventure of epic proportions! Upon its release, The Witcher 3: Wild Hunt became an instant classic, claiming over 250 Game of the Year awards. Now you can enjoy this huge, over 100-hour long, open-world adventure along with both its story-driven expansions worth an extra 50 hours of gameplay. This edition includes all additional content - new weapons, armor, companion outfits, new game mode and side quests.",
                "age_rating" => "Dewasa +18",
                "thumbnail" => "https://images.igdb.com/igdb/image/upload/t_cover_big/co1wz4.png",
                "video_url" => "https://www.youtube.com/embed/XHrskkHf958",
                "publisher" => "CD Project",
                "platform" => "PC (Microsoft windows)"
            ],
        ]);

        $data_game->map(function ($game, $index) {
            GameListings::create($game);
        });
    }
}