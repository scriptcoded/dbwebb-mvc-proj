<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends BaseController
{
    public function index(Request $request)
    {
        $singleRolls = DB::table('dice_rolls')
            ->where('dice', '=', 1)
            ->get();

        $singleDiceMax = 0;
        $singleDiceData = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0];

        foreach ($singleRolls as $roll) {
            $singleDiceData[$roll->result] = ($singleDiceData[$roll->result] ?? 0) + 1;

            if ($singleDiceData[$roll->result] > $singleDiceMax) {
                $singleDiceMax = $singleDiceData[$roll->result];
            }
        }

        ksort($singleDiceData);

        $dualRolls = DB::table('dice_rolls')
            ->where('dice', '=', 2)
            ->get();

        $dualDiceMax = 0;
        $dualDiceData = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0];

        foreach ($dualRolls as $roll) {
            $dualDiceData[$roll->result] = ($dualDiceData[$roll->result] ?? 0) + 1;

            if ($dualDiceData[$roll->result] > $dualDiceMax) {
                $dualDiceMax = $dualDiceData[$roll->result];
            }
        }

        ksort($dualDiceData);

        return view('statistics', [
            'singleDiceMax' => $singleDiceMax + 1,
            'singleDiceData' => $singleDiceData,
            'dualDiceMax' => $dualDiceMax + 1,
            'dualDiceData' => $dualDiceData
        ]);
    }
}
