<?php

declare(strict_types=1);

namespace Tests\Unit\Game21;

use App\Http\Classes\Game21\DiceHand;
use PHPUnit\Framework\TestCase;

/**
 * Test cases for the Game21 DiceHand class.
 */
class DiceHandTest extends TestCase
{
    /**
     * Try to create the class.
     */
    public function testCreateTheClass()
    {
        $hand = new DiceHand(3);
        $this->assertInstanceOf("App\Http\Classes\Game21\DiceHand", $hand);
    }

    /**
     * Try to get and set the dice count.
     * If you're concerned about testing multiple things here:
     * https://stackoverflow.com/a/5937899
     */
    public function testGetSetDiceCount()
    {
        $hand = new DiceHand(3);
        $hand->setDiceCount(4);

        $this->assertEquals($hand->getDiceCount(), 4);
    }

    /**
     * Try to get dice.
     */
    public function testGetDice()
    {
        $hand = new DiceHand(3);
        $res = $hand->getDice();

        $this->assertIsArray($res);
        $this->assertCount(3, $res);
    }

    /**
     * Try to roll dice.
     */
    public function testRoll()
    {
        $hand = new DiceHand(3);
        $res = $hand->roll();

        $this->assertIsArray($res);
        $this->assertCount(3, $res);
    }

    /**
     * Try to get last result.
     */
    public function testGetLastResult()
    {
        $hand = new DiceHand(3);
        $res = $hand->getLastResult();

        $this->assertEquals($res, 0);
    }
}
