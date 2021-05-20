<?php

declare(strict_types=1);

namespace App\Http\Classes\Game21;

class Dice
{
    private int $sides;
    private ?int $last_roll = null;

    public function __construct($sides)
    {
        $this->setSides($sides);
    }

    public function setSides(int $sides)
    {
        $this->sides = $sides;
    }

    public function getSides()
    {
        return $this->sides;
    }

    public function getLastRoll()
    {
        return $this->last_roll;
    }

    public function roll()
    {
        $this->last_roll = random_int(1, $this->sides);

        return $this->last_roll;
    }
}
