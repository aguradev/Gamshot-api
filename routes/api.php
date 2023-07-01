<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameListingsController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware("auth:api")->group(function () {
    Route::apiResource("games", GameListingsController::class);
    Route::post('games/{game}/add-genre', [GameListingsController::class, "gameStoreGenre"]);
    Route::post('user/logout', LogoutController::class);
    Route::post('user/{game}/add-favorite', [GameListingsController::class, 'userAddFavoriteGame']);
    Route::get("user/profile", ProfileController::class);
});

Route::post('user/login', AuthController::class);
Route::post('user/register', RegisterController::class);
