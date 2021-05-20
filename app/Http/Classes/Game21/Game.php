<?php

declare(strict_types=1);

namespace App\Http\Classes\Game21;

class Game
{
    private int $points_player = 0;
    private int $points_computer = 0;
    private ?int $dice_count = null;
    public $hand;

    private int $wins_player = 0;
    private int $wins_computer = 0;

    private ?string $winner = null;

    public function getHand()
    {
        return $this->hand;
    }

    public function setDiceCount($dice_count)
    {
        $this->dice_count = $dice_count;

        $this->hand = new DiceHand($dice_count);
    }

    public function getDiceCount()
    {
        return $this->dice_count;
    }

    public function getWinsPlayer()
    {
        return $this->wins_player;
    }

    public function getWinsComputer()
    {
        return $this->wins_computer;
    }

    public function getPointsPlayer()
    {
        return $this->points_player;
    }

    public function getPointsComputer()
    {
        return $this->points_computer;
    }

    public function roll()
    {
        $this->hand->roll();

        $result = $this->hand->getLastResult();

        $this->points_player += $result;

        if ($this->points_player === 21) {
            $this->setWinnerPlayer();
        } else if ($this->points_player > 21) {
            $this->setWinnerComputer();
        }
    }

    public function setWinnerPlayer()
    {
        $this->winner = "player";
        $this->wins_player += 1;
    }

    public function setWinnerComputer()
    {
        $this->winner = "computer";
        $this->wins_computer += 1;
    }

    public function clearWinner()
    {
        $this->winner = null;
    }

    public function getWinner()
    {
        return $this->winner;
    }

    public function playComputer()
    {
        while ($this->points_computer < 21) {
            $this->hand->roll();

            $result = $this->hand->getLastResult();

            $this->points_computer += $result;

            if ($this->points_computer > 21) {
                break;
            }

            $beat_player = $this->points_computer >= $this->points_player;
            $beat_game = $this->points_computer === 21;

            if ($beat_player || $beat_game) {
                $this->setWinnerComputer();
                return;
            }
        }

        $this->setWinnerPlayer();
    }

    public function nextRound()
    {
        $this->clearWinner();

        $this->points_player = 0;
        $this->points_computer = 0;
    }
}
