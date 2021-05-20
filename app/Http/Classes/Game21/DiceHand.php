<?php

declare(strict_types=1);

namespace App\Http\Classes\Game21;

class DiceHand
{
    private int $dice_count;
    private array $dice = [];

    public function __construct($dice_count)
    {
        $this->setDiceCount($dice_count);
    }

    public function setDiceCount(int $dice_count)
    {
        $this->dice_count = $dice_count;

        $this->dice = [];

        for ($i = 0; $i < $dice_count; $i++) {
            $dice = new GraphicalDice();
            array_push($this->dice, $dice);
        }
    }

    public function getDiceCount()
    {
        return $this->dice_count;
    }

    public function getDice()
    {
        return $this->dice;
    }

    public function roll()
    {
        foreach ($this->dice as $dice) {
            $dice->roll();
        }

        return $this->dice;
    }

    public function getLastResults()
    {
        return array_map(function ($dice) {
            return $dice->getLastRoll();
        }, $this->dice);
    }

    public function getLastResult()
    {
        $results = $this->getLastResults();

        return array_sum($results);
    }
}
