<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserLoginCollection;
use App\Models\UserLogin;
use App\Http\Requests\StoreUserLoginRequest;
use App\Http\Requests\UpdateUserLoginRequest;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        return response()->json([
            'usersLogins' => new UserLoginCollection($request->userId ? UserLogin::where('user_id', '=', $request->userId)->get()->sortDesc() : UserLogin::all()->sortDesc())
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserLoginRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserLogin $userLogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserLogin $userLogin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserLoginRequest $request, UserLogin $userLogin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserLogin $userLogin)
    {
        //
    }
}
