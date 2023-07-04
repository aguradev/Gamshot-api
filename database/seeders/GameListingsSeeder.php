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
                "slug" => Str("Grand Theft Auto V: Special Edition")->slug(),
                "description" => "Grand Theft Auto V is the largest and most ambitious game Rockstar Games has yet created, and takes full advantage of every ounce of processing power available in the current generation of consoles. In order to provide the best possible experience for such a massive and detailed world, the game will have installation requirements on the Xbox 360.
                ",
                "age_rating" => "Dewasa +18",
                "thumbnail" => "https://images.igdb.com/igdb/image/upload/t_cover_big/co2nbc.png",
                "video_url" => "https://www.youtube.com/embed/QkkoHAzjnUs",
                "publisher" => "Rockstar Games",
                "platform" => "Playstation",
                "banner" => "https://shorturl.at/dyEF5"
            ],
            [
                "title" => "The Witcher 3: Wild Hunt - Game of the Year Edition",
                "slug" => Str("The Witcher 3: Wild Hunt - Game of the Year Edition")->slug(),
                "description" => "Become a professional monster slayer and embark on an adventure of epic proportions! Upon its release, The Witcher 3: Wild Hunt became an instant classic, claiming over 250 Game of the Year awards. Now you can enjoy this huge, over 100-hour long, open-world adventure along with both its story-driven expansions worth an extra 50 hours of gameplay. This edition includes all additional content - new weapons, armor, companion outfits, new game mode and side quests.",
                "age_rating" => "Dewasa +18",
                "thumbnail" => "https://images.igdb.com/igdb/image/upload/t_cover_big/co1wz4.png",
                "video_url" => "https://www.youtube.com/embed/XHrskkHf958",
                "publisher" => "CD Project",
                "platform" => "PC (Microsoft windows)",
                "banner" => "https://shorturl.at/orG28"
            ],
            [
                "title" => "Honkai: Star Rail",
                "slug" => Str("Honkai: Star Rail")->slug(),
                "description" => "Honkai: Star Rail is an all-new strategy-RPG title in the Honkai series that takes players on a cosmic adventure across the stars. Hop aboard the Astral Express and experience the galaxy's infinite wonders on this journey filled with adventure and thrill.",
                "age_rating" => "Remaja +13",
                "thumbnail" => "https://images.igdb.com/igdb/image/upload/t_cover_big/co6f1s.png",
                "video_url" => "https://www.youtube.com/embed/w8vPZrMFiZ4",
                "publisher" => "Hoyoverse",
                "platform" => "PC (Microsoft windows)",
                "banner" => "https://shorturl.at/ct059"
            ],
            [
                "title" => "Apex Legends",
                "slug" => Str("Apex Legends")->slug(),
                "description" => "Conquer with character in Apex Legends, a free-to-play Hero shooter where legendary characters with powerful abilities team up to battle for fame & fortune on the fringes of the Frontier.",
                "age_rating" => "Remaja +13",
                "thumbnail" => "https://shorturl.at/kNRT0",
                "video_url" => "https://www.youtube.com/embed/w8vPZrMFiZ4",
                "publisher" => "Electronics Arts",
                "platform" => "PC (Microsoft windows)",
                "banner" => "https://shorturl.at/qsGM4"
            ],
            [
                "title" => "Watch Dogs 2",
                "slug" => Str("Watch Dogs 2")->slug(),
                "description" => "Explore a massive and dynamic open world offering an incredible variety of gameplay possibilities. Hack your way through traffic while you engage in dangerous car chases through the winding streets of San Francisco, traverse the rooftops of the colorful and vibrant neighborhoods of Oakland, and infiltrate the cutting-edge offices of Silicon Valley companies. There are many secrets to uncover in the birthplace of the tech revolution.",
                "age_rating" => "Dewasa +18",
                "thumbnail" => "https://images.igdb.com/igdb/image/upload/t_cover_big/co2p3j.png",
                "video_url" => "https://www.youtube.com/embed/hh9x4NqW0Dw",
                "publisher" => "Ubisoft",
                "platform" => "Playstation",
                "banner" => "https://shorturl.at/uyMN5"
            ],
            [
                "title" => "God of War",
                "slug" => Str("God of War")->slug(),
                "description" => "God of War is the sequel to God of War III as well as a continuation of the canon God of War chronology. Unlike previous installments, this game focuses on Norse mythology and follows an older and more seasoned Kratos and his son Atreus in the years since the third game. It is in this harsh, unforgiving world that he must fight to survive… and teach his son to do the same.",
                "age_rating" => "Dewasa +18",
                "thumbnail" => "https://images.igdb.com/igdb/image/upload/t_cover_big/co1tmu.png",
                "video_url" => "https://www.youtube.com/embed/K0u_kAWLJOA",
                "publisher" => "Santa Monica Studio",
                "platform" => "Playstation",
                "banner" => "https://shorturl.at/gtEO2"
            ]
        ]);

        $data_game->map(function ($game, $index) {
            GameListings::create($game);
        });
    }
}
