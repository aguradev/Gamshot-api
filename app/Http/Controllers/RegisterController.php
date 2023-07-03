<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $data = [
                "username" => $request->username,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "joined_since" => now("GMT+8")
            ];

            User::create($data);

            return response()->json([
                "message" => "User Register Successfully",
                "status_code" => Response::HTTP_CREATED
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
}
