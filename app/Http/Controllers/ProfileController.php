<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    public function __invoke()
    {

        $Users = User::with(["FavoriteGames" => function ($builder) {
            return $builder->select(["title", "thumbnail"]);
        }])->whereId(auth("api")->user()->id)->first();

        return response()->json([
            "data" => $Users,
        ])->setStatusCode(Response::HTTP_FOUND);
    }
}
