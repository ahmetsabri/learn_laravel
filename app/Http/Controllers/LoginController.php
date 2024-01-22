<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        if (! auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['error' => 'try again'], 401);
        }

        $token = auth()->user()->createToken('personal-token', ['show:user'], now()->addDay())->plainTextToken;

        return response()->json(['token' => $token]);

    }
}
