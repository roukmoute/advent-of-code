<?php
namespace AdventOfCode\Day2;

class Test extends \PHPUnit_Framework_TestCase
{
    /** @var Day2 */
    private $day2;

    public function setUp()
    {
        $this->day2 = new Day2();
    }

    public function testSurfaceWith1x1x1()
    {
        $this->day2->setDimensions('1x1x1');
        $this->assertEquals(6, $this->day2->getSurface());
    }

    public function testExtraPaperWith1x1x1()
    {
        $this->day2->setDimensions('1x1x1');
        $this->assertEquals(1, $this->day2->getExtraPaper());
    }

    public function testSurfaceWith1x1x2()
    {
        $this->day2->setDimensions('1x1x2');
        $this->assertEquals(10, $this->day2->getSurface());
    }

    public function testExtraPaperWith2x2x1()
    {
        $this->day2->setDimensions('2x2x1');
        $this->assertEquals(2, $this->day2->getExtraPaper());
    }

    public function testSquareFeetWith2x3x4()
    {
        $this->day2->setDimensions('2x3x4');
        $this->assertEquals(58, $this->day2->getSquareFeet());
    }

    public function testSquareFeetWith1x1x10()
    {
        $this->day2->setDimensions('1x1x10');
        $this->assertEquals(43, $this->day2->getSquareFeet());
    }

    public function testTotalSquareFeetWith1x1x1And1x1x2()
    {
        $this->day2->addDimensions(
            '1x1x1
        1x1x2'
        );
        $this->assertEquals(18, $this->day2->getTotalSquareFeet());
    }

    public function testTotalSquareFeetWith2x3x4And1x1x10()
    {
        $this->day2->addDimensions(
            '2x3x4
        1x1x10'
        );
        $this->assertEquals(101, $this->day2->getTotalSquareFeet());
    }

    public function testRibbonWith2x3x4()
    {
        $this->day2->setDimensions('2x3x4');
        $this->assertEquals(34, $this->day2->getFeetOfRibbon());
    }

    public function testRibbonWith1x1x10()
    {
        $this->day2->setDimensions('1x1x10');
        $this->assertEquals(14, $this->day2->getFeetOfRibbon());
    }

    public function testRibbonWith1x1x1And1x1x2()
    {
        $this->day2->addDimensions(
            '1x1x1
        1x1x2'
        );
        $this->assertEquals(11, $this->day2->getTotalFeetOfRibbon());
    }

    public function testRibbonWith2x3x4And1x1x10()
    {
        $this->day2->addDimensions(
            '2x3x4
        1x1x10'
        );
        $this->assertEquals(48, $this->day2->getTotalFeetOfRibbon());
    }
}
