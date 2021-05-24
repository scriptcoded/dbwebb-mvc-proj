<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HighscoreController extends BaseController
{
    public function index(Request $request)
    {
        $startDate = null;
        $endDate = null;
        $name = null;

        if (!$request->input('reset')) {
            $startDate = $request->input('startdate');
            $endDate = $request->input('enddate');
            $name = $request->input('name');
        }

        $highscores = DB::table('highscores')
            ->select('*', DB::raw('(`player_score`- `computer_score`) AS score'))
            ->orderBy('score', 'desc');

        if ($startDate) {
            $highscores->whereDate('created_at', '>=', $startDate);
        }

        if ($endDate) {
            $highscores->whereDate('created_at', '<=', $endDate);
        }

        if ($name) {
            $highscores->where('name', 'like', '%' . $name . '%');
        }

        return view('highscores', [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'name' => $name,
            'highscores' => $highscores->get(),
            'highlighted' => $request->input('score_id')
        ]);
    }
}
