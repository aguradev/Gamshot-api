<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            "username" => 'required',
            'password' => 'required',
            'device_name' => 'required'
        ]);

        if (!Auth::attempt($request->only('username', 'password'))) {
            return response()->json([
                "message" => "User or password is wrong.",
            ])->setStatusCode(Response::HTTP_UNAUTHORIZED);
        }

        $user = auth("api")->user();

        return response()->json([
            "message" => "login successfully.",
            "token" => "Bearer " . $user->createToken($request->device_name)->plainTextToken,
            "user" => $user
        ])->setStatusCode(Response::HTTP_OK);
    }
}
