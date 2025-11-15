<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// API ROUTES

use App\Http\Controllers\GameController;
use App\Http\Controllers\LeaderboardController;

Route::post('/start', [GameController::class, 'start']);
Route::post('/guess', [GameController::class, 'guess']);
Route::get('/leaderboard', [LeaderboardController::class, 'index']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
