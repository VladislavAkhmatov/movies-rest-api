<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\FilmController;
use App\Http\Controllers\Api\V1\GenreConrtoller;
use App\Http\Controllers\Api\V1\HallController;
use App\Http\Controllers\Api\V1\ScreeningController;
use App\Http\Controllers\Api\V1\SeatController;
use App\Http\Controllers\Api\V1\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->middleware('throttle:api')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::prefix('v1')->middleware(['throttle:api', 'auth:sanctum'])->group(function () {
    Route::apiResource('/genres', GenreConrtoller::class);
    Route::apiResource('/films', FilmController::class);
    Route::apiResource('/halls', HallController::class);
    Route::apiResource('/screenings', ScreeningController::class);
    Route::apiResource('/seats', SeatController::class);
    Route::apiResource('/tickets', TicketController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});


