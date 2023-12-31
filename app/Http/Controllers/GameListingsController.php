<?php

namespace App\Http\Controllers;

use App\Models\Api\GameListings;
use App\Http\Requests\StoreGameListingsRequest;
use App\Http\Requests\UpdateGameListingsRequest;
use App\Models\Api\Genres;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\ItemNotFoundException;
use PHPUnit\Event\Code\Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use function PHPUnit\Framework\throwException;

class GameListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $queryGameListings = GameListings::query();

        $queryGameListings->when($request->query("limit"), function ($builder) use ($request) {
            return $builder->take($request->query("limit"));
        });

        $games = $queryGameListings->select("title", "slug", "thumbnail", "banner")->get();

        return response()->json($games)->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function gameStoreGenre(GameListings $game, Request $request)
    {
        try {
            $request_genre = collect($request->input("genre"));



            $request_genre->map(function ($genre) use ($game) {
                $genres = Genres::whereName($genre)->first();

                if (is_null($genres)) {
                    throw new Exception("Data genre not found");
                }

                $genre_id = $genres->id;

                $game->Genre()->syncWithoutDetaching($genre_id);
            });

            return response()->json([
                "message" => "Added genre success",
            ])->setStatusCode(Response::HTTP_CREATED);
        } catch (Exception $th) {
            return response([
                "error" => [
                    "message" => $th->getMessage(),
                    "status_code" => Response::HTTP_BAD_REQUEST
                ]
            ])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameListingsRequest $request)
    {
        try {
            $data = $request->all();

            $data["slug"] = str($request->title)->slug();

            $created = GameListings::create($data);

            return response()->json([
                "message" => "Data Game Success Saved",
                "list" => $created
            ])->setStatusCode(Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response([
                "error" => [
                    "message" => "Data failed to save",
                    "status_code" => Response::HTTP_BAD_REQUEST
                ]
            ])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(GameListings $game)
    {
        $game->load("genre");

        return response()->json($game)->setStatusCode(Response::HTTP_OK);
    }

    public function userAddFavoriteGame(Request $request, GameListings $game)
    {


        try {
            $request_users = $request->user("api");

            $request_users->FavoriteGames()->syncWithoutDetaching($game->id);

            return response()->json([
                "message" => "Added Favorite!",
                "status_code" => Response::HTTP_CREATED
            ])->setStatusCode(Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response([
                "error" => [
                    "message" => "Failed to add favorite",
                    "status_code" => Response::HTTP_BAD_REQUEST
                ]
            ])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GameListings $gameListings)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameListingsRequest $request, GameListings $gameListings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GameListings $gameListings)
    {
        //
    }
}
