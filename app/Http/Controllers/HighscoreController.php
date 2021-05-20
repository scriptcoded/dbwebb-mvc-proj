<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HighscoreController extends BaseController
{
    public function index(Request $request)
    {
        $highscores = DB::table('highscores')
            ->select('*', DB::raw('(`player_score`- `computer_score`) AS score'))
            ->orderBy('score', 'desc')
            ->get();

        return view('highscores', [
            'highscores' => $highscores,
            'highlighted' => $request->input('score_id')
        ]);
    }
}
