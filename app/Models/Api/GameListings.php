<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameListings extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        "title",
        "description",
        "age_rating",
        "thumbnail",
        "video_url",
        "publisher",
        "platform"
    ];

    public function Genre()
    {
        return $this->belongsToMany(Genres::class, 'games_has_genres', 'game_id', 'genre_id');
    }
}
