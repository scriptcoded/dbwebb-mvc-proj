<?php

declare(strict_types=1);

namespace Tests\Unit\Game21;

use App\Http\Classes\Game21\Dice;
use PHPUnit\Framework\TestCase;

/**
 * Test cases for the Game21 Dice class.
 */
class DiceTest extends TestCase
{
    /**
     * Try to create the class.
     */
    public function testCreateTheClass()
    {
        $dice = new Dice(6);
        $this->assertInstanceOf("App\Http\Classes\Game21\Dice", $dice);
    }

    /**
     * Try to get and set the sides.
     * If you're concerned about testing multiple things here:
     * https://stackoverflow.com/a/5937899
     */
    public function testGetSetSides()
    {
        $dice = new Dice(6);
        $dice->setSides(5);

        $this->assertEquals($dice->getSides(), 5);
    }

    /**
     * Try to roll.
     */
    public function testRoll()
    {
        $dice = new Dice(6);
        $res = $dice->roll();

        $this->assertEquals($res, $dice->getLastRoll());
    }
}
