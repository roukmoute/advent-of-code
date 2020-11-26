<?php
namespace AdventOfCode\Day1;

class Test extends \PHPUnit_Framework_TestCase
{
    /** @var Day1 */
    private $day1;

    public function setUp()
    {
        $this->day1 = new Day1();
    }

    public function testStartsOnTheGroundFloor()
    {
        $this->assertEquals(0, $this->day1->getFloor());
    }

    public function testUpOneFloor()
    {
        $this->day1->addOpeningParenthesis();

        $this->assertEquals(1, $this->day1->getFloor());
    }

    public function testUpTwoFloors()
    {
        $this->day1->addOpeningParenthesis();
        $this->day1->addOpeningParenthesis();

        $this->assertEquals(2, $this->day1->getFloor());
    }

    public function testDownOneFloor()
    {
        $this->day1->addClosingParenthesis();

        $this->assertEquals(-1, $this->day1->getFloor());
    }

    public function testDownTwoFloors()
    {
        $this->day1->addClosingParenthesis();
        $this->day1->addClosingParenthesis();

        $this->assertEquals(-2, $this->day1->getFloor());
    }

    public function testUpOneFloorAndDownOneFloor()
    {
        $this->day1->addOpeningParenthesis();
        $this->day1->addClosingParenthesis();

        $this->assertEquals(0, $this->day1->getFloor());
    }

    public function testCharOpeningParenthesis()
    {
        $this->day1->setParenthesis('(');

        $this->assertEquals(1, $this->day1->getFloor());
    }

    public function testCharClosingParenthesis()
    {
        $this->day1->setParenthesis(')');

        $this->assertEquals(-1, $this->day1->getFloor());
    }

    public function testCharsOpeningAndClosingParenthesis()
    {
        $this->day1->setParenthesis('(');
        $this->day1->setParenthesis(')');

        $this->assertEquals(0, $this->day1->getFloor());
    }

    public function testStringOfParenthesisToGetZero()
    {
        $this->day1->stringOfParenthesis('(())');

        $this->assertEquals(0, $this->day1->getFloor());
    }

    public function testStringOfParenthesisToGetThree()
    {
        $this->day1->stringOfParenthesis('))(((((');

        $this->assertEquals(3, $this->day1->getFloor());
    }

    public function testEnterTheBasementAtCharacterPositionOne()
    {
        $this->day1->activeTheFirstPositionToEnterTheBasement();
        $this->day1->setParenthesis(')');

        $this->assertEquals(1, $this->day1->getPositionToEnterTheBasement());
    }

    public function testEnterTheBasementAtCharacterPositionFive()
    {
        $this->day1->activeTheFirstPositionToEnterTheBasement();
        $this->day1->stringOfParenthesis('()())');

        $this->assertEquals(5, $this->day1->getPositionToEnterTheBasement());
    }
}
