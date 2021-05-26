<?php

declare(strict_types=1);

namespace Tests\Unit\Game21;

use App\Http\Classes\Game21\DiceHand;
use App\Http\Classes\Game21\Game;
use PHPUnit\Framework\TestCase;

/**
 * Test cases for the Game21 Game class.
 */
class GameTest extends TestCase
{
    /**
     * Try to create the class.
     */
    public function testCreateTheClass()
    {
        $game = new Game();
        $this->assertInstanceOf("App\Http\Classes\Game21\Game", $game);
    }

    /**
     * Try set and get dice count.
     */
    public function testSetGetDiceCount()
    {
        $game = new Game();
        $game->setDiceCount(3);

        $this->assertEquals($game->getDiceCount(), 3);
    }

    /**
     * Try to get the hand.
     */
    public function testGetHand()
    {
        $game = new Game();
        $game->setDiceCount(3);
        $hand = $game->getHand();

        $this->assertInstanceOf("App\Http\Classes\Game21\DiceHand", $hand);
    }

    /**
     * Try to get wins player.
     */
    public function testGetWinsPlayer()
    {
        $game = new Game();
        $res = $game->getWinsPlayer();

        $this->assertEquals($res, 0);
    }

    /**
     * Try to get wins computer.
     */
    public function testGetWinsComputer()
    {
        $game = new Game();
        $res = $game->getWinsComputer();

        $this->assertEquals($res, 0);
    }

    /**
     * Try to get points player.
     */
    public function testGetPointsPlayer()
    {
        $game = new Game();
        $res = $game->getPointsPlayer();

        $this->assertEquals($res, 0);
    }

    /**
     * Try to get points computer.
     */
    public function testGetPointsComputer()
    {
        $game = new Game();
        $res = $game->getPointsComputer();

        $this->assertEquals($res, 0);
    }

    /**
     * Try to roll.
     */
    public function testRollPlayer()
    {
        $handStub = $this->createMock(DiceHand::class);
        $handStub->setDiceCount(6);
        $handStub
            ->method("getLastResult")
            ->willReturn(21);

        $game = new Game();
        $game->hand = $handStub;

        $game->roll();
        $res = $game->getPointsPlayer();

        $this->assertEquals(21, $res);
    }

    /**
     * Try to roll.
     */
    public function testRollComputer()
    {
        $handStub = $this->createMock(DiceHand::class);
        $handStub->setDiceCount(6);
        $handStub
            ->method("getLastResult")
            ->willReturn(22);

        $game = new Game();
        $game->hand = $handStub;

        $game->roll();
        $res = $game->getPointsPlayer();

        $this->assertEquals(22, $res);
    }

    /**
     * Try not to clear winner.
     */
    public function testNotClearWinner()
    {
        $game = new Game();
        $game->setDiceCount(40);

        $game->roll();

        $this->assertNotNull($game->getWinner());
    }

    /**
     * Try to clear winner.
     */
    public function testClearWinner()
    {
        $game = new Game();
        $game->setDiceCount(40);

        $game->roll();
        $game->clearWinner();

        $this->assertNull($game->getWinner());
    }

    /**
     * Try to fail as computer.
     */
    public function testPlayComputerFail()
    {
        $game = new Game();
        $game->setDiceCount(40);

        $game->playComputer();

        $this->assertEquals($game->getWinner(), "player");
    }

    /**
     * Try to play as computer.
     */
    public function testPlayComputer()
    {
        $game = new Game();
        $game->setDiceCount(1);

        $game->playComputer();

        $this->assertEquals($game->getWinner(), "computer");
    }

    /**
     * Try next round.
     */
    public function testNextRound()
    {
        $game = new Game();
        $game->setDiceCount(40);

        $game->roll();
        $game->nextRound();

        $this->assertNull($game->getWinner());
        $this->assertEquals($game->getPointsPlayer(), 0);
        $this->assertEquals($game->getPointsComputer(), 0);
    }
}
