<?php

namespace App\Http\Controllers;

use App\Http\Classes\Game21\Game;
use App\Models\DiceRoll;
use App\Models\Highscore;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Game21Controller extends BaseController
{
    public function index(Request $request)
    {
        if (!$request->session()->has('game21')) {
            $game = new Game();
            $game->setOnPlayerRoll('\\App\\Http\\Controllers\\Game21Controller::onPlayerRoll');
            $game->setOnComputerRoll('\\App\\Http\\Controllers\\Game21Controller::onComputerRoll');

            $request->session()->put('game21', $game);
        }

        return view('game21', [
            'game' => $request->session()->get('game21')
        ]);
    }

    public function reset(Request $request)
    {
        $request->session()->forget('game21');

        return redirect()->route('game21');
    }

    public function setDice(Request $request)
    {
        $game = $request->session()->get('game21');

        $game->setBetPlayer(intval($request->input('bet')));
        $game->randomizeBetComputer();

        $game->setDiceCount(intval($request->input('dice')));

        return redirect()->route('game21');
    }

    public function roll(Request $request)
    {
        $game = $request->session()->get('game21');
        $game->roll();

        // $rolls = $game->getHand()->getLastResults();
        // $this->saveRolls($rolls, 'player');

        return redirect()->route('game21');
    }

    public function stop(Request $request)
    {
        $game = $request->session()->get('game21');
        $game->playComputer();

        return redirect()->route('game21');
    }

    public function nextRound(Request $request)
    {
        $game = $request->session()->get('game21');

        $game->setBetPlayer(intval($request->input('bet')));
        $game->randomizeBetComputer();

        $game->nextRound();

        return redirect()->route('game21');
    }

    public function saveScore(Request $request)
    {
        $game = $request->session()->get('game21');

        $player_score = $game->getWinsPlayer();
        $computer_score = $game->getWinsComputer();

        $highscore = new Highscore();

        $highscore->name = $request->input('name');
        $highscore->player_score = $player_score;
        $highscore->computer_score = $computer_score;

        $highscore->save();

        $request->session()->forget('game21');

        return redirect()->route('highscores', [
            'score_id' => $highscore->id
        ]);
    }

    static public function onPlayerRoll($rolls) {
        self::saveRolls($rolls, 'player');
    }

    static public function onComputerRoll($rolls) {
        self::saveRolls($rolls, 'computer');
    }

    static public function saveRolls($rolls, $rolledBy) {
        $data = [];

        // Store every single dice roll
        foreach ($rolls as $result) {
            $data[] = [
                'result' => $result,
                'dice' => 1,
                'rolled_by' => $rolledBy
            ];
        }

        // Also store the sum of the dice so that we can track dice combinations
        // as well
        if (count($rolls) > 1) {
            $data[] = [
                'result' => array_sum($rolls),
                'dice' => count($rolls),
                'rolled_by' => $rolledBy
            ];
        }

        // Do the insertion
        DiceRoll::insert($data);
    }
}
