<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json([
            'count' => User::all()->count(),
            'users' => new UserCollection(User::all()->except(auth('sanctum')->user()->user_id))
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $registerController = new RegisteredUserController();

        try {
            $registerController->store($request);

            return response()->json([
                'message' => ucfirst($request->type) . " account created successfully"
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return response()->json([
            'user' => new UserResource($user, ['logins'])
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        try {
            $user->update([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                // 'email' => $request->input('email'),
                'type' => $request->input('type'),
            ]);

            return response()->json([
                'message' => 'User updated successfully'
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        try {
            $user->delete();
            return response()->json([
                'message' => "User deleted successfully"
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function manageAccess(Request $request)
    {
        $request->validate([
            'userId' => ['required']
        ]);

        $intention = $request->intention;
        $userId = $request->userId;

        try {
            $user = User::find($userId);
            $user->update(['status' => $intention]);

            return response()->json([
                "message" => "Account set to " . $intention . " successfully"
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
