<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {

    //Login endpoint
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    //Register endpoint
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::group(['middleware' => 'auth:sanctum'], function () {

        //Users endpoint
        Route::apiResource('/users', UserController::class);

        //Users endpoint
        Route::apiResource('/logins', LoginController::class);

        //Verify token endpoint
        Route::get('verify-token', function () {
            return response()->noContent(200);
        });
    });
});
