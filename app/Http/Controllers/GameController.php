<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leaderboard;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    // Start a new game: set secret number (1-100) and attempts=0 in session
    public function start(Request $request)
    {
        $min = 1;
        $max = 100;

        session([
            'secret' => rand($min, $max),
            'attempts' => 0,
        ]);

        return response()->json([
            'status' => 'ok',
            'message' => "Game dimulai. Tebak angka antara $min - $max.",
        ]);
    }

    // Handle a guess
    public function guess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guess' => 'required|integer|min:1|max:100',
            'player_name' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Input tidak valid.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $guess = (int) $request->input('guess');
        $playerName = $request->input('player_name');

        if (!session()->has('secret')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Permainan belum dimulai. Klik "Mulai Game" dulu.',
            ], 400);
        }

        $secret = session('secret');
        $attempts = session('attempts', 0) + 1;
        session(['attempts' => $attempts]);

        if ($guess === $secret) {
            // Record to leaderboard
            Leaderboard::create([
                'attempts' => $attempts,
                'player_name' => $playerName ?: null,
            ]);

            // Reset session game state
            session()->forget(['secret', 'attempts']);

            return response()->json([
                'status' => 'correct',
                'message' => "Selamat! Tebakan benar dalam $attempts percobaan.",
                'attempts' => $attempts,
            ]);
        }

        if ($guess > $secret) {
            return response()->json([
                'status' => 'high',
                'message' => 'Terlalu tinggi, coba lagi.',
                'attempts' => $attempts,
            ]);
        }

        return response()->json([
            'status' => 'low',
            'message' => 'Terlalu rendah, coba lagi.',
            'attempts' => $attempts,
        ]);
    }
}
