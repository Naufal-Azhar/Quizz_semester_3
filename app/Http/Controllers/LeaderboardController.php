<?php

namespace App\Http\Controllers;

use App\Models\Leaderboard;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    // Return top N leaderboard entries (default 5)
    public function index(Request $request)
    {
        $limit = (int) $request->query('limit', 5);

        $top = Leaderboard::orderBy('attempts', 'asc')
            ->orderBy('created_at', 'asc')
            ->limit($limit)
            ->get(['player_name', 'attempts', 'created_at']);

        return response()->json($top);
    }
}
