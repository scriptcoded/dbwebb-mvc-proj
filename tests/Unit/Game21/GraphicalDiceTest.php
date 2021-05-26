<?php

declare(strict_types=1);

namespace Tests\Unit\Game21;

use App\Http\Classes\Game21\GraphicalDice;
use PHPUnit\Framework\TestCase;

/**
 * Test cases for the Game21 GraphicalDice class.
 */
class GraphicalDiceTest extends TestCase
{
    /**
     * Try to create the class.
     */
    public function testCreateTheClass()
    {
        $dice = new GraphicalDice();
        $this->assertInstanceOf("App\Http\Classes\Game21\GraphicalDice", $dice);
    }

    /**
     * Try render.
     */
    public function testRender()
    {
        $dice = new GraphicalDice();
        $res = $dice->render();

        $this->assertStringStartsWith("╭", $res);
    }
}
