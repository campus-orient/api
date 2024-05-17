<?php

use App\Events\LoginEvent;
use App\Http\Controllers\UserLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\InterestsPlaceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use App\Models\UserLogin;

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

        //Interests places endpoint
        Route::apiResource('/interests-places', InterestsPlaceController::class);

        //Users endpoint
        Route::apiResource('/users', UserController::class);

        //Users logins endpoint
        Route::apiResource('/users-logins', UserLoginController::class);

        //Visits endpoint
        Route::apiResource('/visits', VisitController::class);

        //Verify token endpoint
        Route::get('verify-token', function () {
            event(new LoginEvent(auth('sanctum')->user()));
            return response()->noContent(200);
        });
    });
});
