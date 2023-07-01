<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogoutController extends Controller
{
    public function __invoke(User $user)
    {
        $auth_user = auth("api")->user();

        $auth_user->currentAccessToken()->delete();

        return response()->json([
            "message" => "Logout user success.",
            "user" => $auth_user
        ])->setStatusCode(Response::HTTP_OK);
    }
}
