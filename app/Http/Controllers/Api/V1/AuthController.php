<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Email və ya şifrə yalnışdır'], 401);
        }

        return response()->json([
            'token' => $token,
            'user' => auth('api')->user(),
        ]);
    }


    public function logout()
    {
        Auth::guard('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function me()
    {
        return response()->json(Auth::guard('api')->user());
    }
}
