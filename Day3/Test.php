<?php
namespace AdventOfCode\Day3;

class Test extends \PHPUnit_Framework_TestCase
{
    /** @var Day3 */
    private $day3;

    public function setUp()
    {
        $this->day3 = new Day3();
    }

    public function testNoMove()
    {
        $this->assertEquals(1, $this->day3->getHousesVisited());
    }

    public function testMoveToRight()
    {
        $this->day3->move('>');
        $this->assertEquals(2, $this->day3->getHousesVisited());
    }

    public function testMoveTwiceToRight()
    {
        $this->day3->move('>>');
        $this->assertEquals(3, $this->day3->getHousesVisited());
    }

    public function testMoveRightAndMoveLeft()
    {
        $this->day3->move('><');
        $this->assertEquals(2, $this->day3->getHousesVisited());
    }

    public function testMoveRightAndLeftFifthTimes()
    {
        $this->day3->move('><><><><><');
        $this->assertEquals(2, $this->day3->getHousesVisited());
    }

    public function testMoveUp()
    {
        $this->day3->move('^');
        $this->assertEquals(2, $this->day3->getHousesVisited());
    }

    public function testMoveUpAndDown()
    {
        $this->day3->move('^v');
        $this->assertEquals(2, $this->day3->getHousesVisited());
    }

    public function testMoveSquare()
    {
        $this->day3->move('^>v<');
        $this->assertEquals(4, $this->day3->getHousesVisited());
    }

    public function testMoveUpAndDownFifthTimes()
    {
        $this->day3->move('^v^v^v^v^v');
        $this->assertEquals(2, $this->day3->getHousesVisited());
    }

    public function testMoveUpAndDownWithRobot()
    {
        $this->day3->activeRobot();
        $this->day3->move('^v');
        $this->assertEquals(3, $this->day3->getHousesVisited());
    }

    public function testMoveSquareWithRobot()
    {
        $this->day3->activeRobot();
        $this->day3->move('^>v<');
        $this->assertEquals(3, $this->day3->getHousesVisited());
    }

    public function testMoveUpAndDownFifthTimesWithRobot()
    {
        $this->day3->activeRobot();
        $this->day3->move('^v^v^v^v^v');
        $this->assertEquals(11, $this->day3->getHousesVisited());
    }

    public function testMovesComplexWithRobot()
    {
        $this->day3->activeRobot();
        $this->day3->move('v<>>^^<><>v>^<v<>^>>>><>v>^v>^<<');
        $this->assertEquals(18, $this->day3->getHousesVisited());
    }
}
