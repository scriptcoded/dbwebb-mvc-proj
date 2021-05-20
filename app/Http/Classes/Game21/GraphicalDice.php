<?php

declare(strict_types=1);

namespace App\Http\Classes\Game21;

class GraphicalDice extends Dice
{
    public function __construct()
    {
        parent::__construct(6);
    }

    public static function renderDice($result)
    {
        $marker = "●";
        $spa = " ";

        $diaOn = $result > 1;
        $dibOn = $result > 3;
        $horOn = $result === 6;
        $cenOn = $result % 2 === 1;

        $dia = $diaOn ? $marker : $spa;
        $dib = $dibOn ? $marker : $spa;
        $hor = $horOn ? $marker : $spa;
        $cen = $cenOn ? $marker : $spa;

        return "╭───────╮\n" .
           "│ $dia $spa $dib │\n" .
           "│ $hor $cen $hor │\n" .
           "│ $dib $spa $dia │\n" .
           "╰───────╯";
    }

    public function render()
    {
        return $this::renderDice($this->getLastRoll());
    }
}
