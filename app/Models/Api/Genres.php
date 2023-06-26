<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        "name",
        "description"
    ];
}
