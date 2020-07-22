<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class UserTokenController extends Controller
{
    public function __invoke(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        /** @var User $user */
        $user = User::where('email', $request->get('email'))->first();

        if (!$user && !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'Error de email o contraseña'
            ]);
        }

        return response()->json([
            'token' => $user->createToken($request->device_name)->plainTextToken
        ]);
    }
}
