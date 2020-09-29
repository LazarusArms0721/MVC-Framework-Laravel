<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class LoginController extends Controller
{
    //

    public function login(Request $request)
    {

        $credentials = $request->only(['email', 'password']);

        if(!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Incorrect email/password'], 401);
        }

        return response()->json(['token' => $token]);

    }

    public function refresh()
    {
        $newToken = auth('api')->refresh();

        return response()->json(['token' => $newToken]);
    }

}
