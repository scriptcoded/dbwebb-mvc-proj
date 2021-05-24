<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends BaseController
{
    public function index(Request $request)
    {
        // $singleDiceMax = 13;
        // $singleDiceData = [1, 3, 8, 12, 5, 2];

        $rolls = DB::table('dice_rolls')
            ->where('dice', '=', 1)
            ->get();

        $singleDiceMax = 0;
        $singleDiceData = [];

        foreach ($rolls as $roll) {
            $singleDiceData[$roll->result] = ($singleDiceData[$roll->result] ?? 0) + 1;

            if ($singleDiceData[$roll->result] > $singleDiceMax) {
                $singleDiceMax = $singleDiceData[$roll->result];
            }
        }

        ksort($singleDiceData);

        return view('statistics', [
            'singleDiceMax' => $singleDiceMax + 1,
            'singleDiceData' => $singleDiceData
        ]);
    }
}
