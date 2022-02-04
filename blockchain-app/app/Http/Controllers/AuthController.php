<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Services\UserService;

class AuthController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $user = $this->getUserByMeta(request(['metamask']));
        if ($user){
            if (!$token = Auth::login($user)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        }
        return $this->respondWithToken($token);
    }

    private function getUserByMeta($metamask){
        return User::where('metamask', $metamask)->first();
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $userService = new UserService();
        return response()->json([
            'access_token' => $token,
            'user' => $userService->prepareDataUser(),
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}