<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        return $request->authenticate();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            $user = $request->user();

            if ($user) {
                $user->tokens()->delete();

                return response()->json([
                    'message' => 'Logged out successfully'
                ], 200);
            }

            return response()->json([
                'message' => 'User not authenticated'
            ], 401);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Verify if user account exists
     */
    public function verifyAccount(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email']
        ], [
            'email.exists' => 'Email provided is not linked to an account'
        ]);

        try {
            $user = User::where('email', '=', $request->email)->first();
            return response()->json([
                "status" => $user->status,
                "password" => $user->password ? "set" : null
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Create new password
     */
    public function createPassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Password::defaults()],
            'email' => ['required', 'email', 'exists:users,email']
        ], [
            'email.exists' => 'Email provided is not linked to an account'
        ]);

        try {
            $user = User::where('email', '=', $request->email)->first();

            $user->update([
                'password' => $request->password
            ]);

            return response()->json([
                'message' => 'Account password updated successfully'
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
