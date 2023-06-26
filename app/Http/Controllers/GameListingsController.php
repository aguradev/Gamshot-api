<?php

namespace App\Http\Controllers;

use App\Models\Api\GameListings;
use App\Http\Requests\StoreGameListingsRequest;
use App\Http\Requests\UpdateGameListingsRequest;
use Illuminate\Http\Response;

class GameListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = GameListings::all();

        return response()->json(["data" => $games])->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameListingsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GameListings $gameListings)
    {
        //
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
