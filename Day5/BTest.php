<?php
use AdventOfCode\Day5\Day5B;

class BTest extends \PHPUnit_Framework_TestCase
{
    /** @var Day5B */
    private $day5;

    public function setUp()
    {
        $this->day5 = new Day5B();
    }

    public function testPairThatAppearsTwiceWithoutOverlappingWithXY()
    {
        $this->assertTrue($this->day5->hasPair('xyxy'));
    }

    public function testPairThatAppearsTwiceWithoutOverlappingWithAA()
    {
        $this->assertTrue($this->day5->hasPair('aabcdefgaa'));
    }

    public function testPairThatAppearsTwiceWithoutOverlappingWithII()
    {
        $this->assertTrue($this->day5->hasPair('xilodxfuxphuiiii'));
    }

    public function testPairThatAppearsTwiceWithOverlappingWithAA()
    {
        $this->assertFalse($this->day5->hasPair('aaa'));
    }

    public function testOneLetterWhichRepeatsWithExactlyOneLetterBetweenThemWithXYX()
    {
        $this->assertTrue($this->day5->hasRepeatedLetter('efe'));
    }

    public function testOneLetterWhichRepeatsWithExactlyOneLetterBetweenThemWithEFE()
    {
        $this->assertTrue($this->day5->hasRepeatedLetter('abcdefeghi'));
    }

    public function testOneLetterWhichRepeatsWithExactlyOneLetterBetweenThemWithAAA()
    {
        $this->assertTrue($this->day5->hasRepeatedLetter('aaa'));
    }

    public function testOneLetterWhichNotRepeatsWithExactlyOneLetterBetweenThem()
    {
        $this->assertFalse($this->day5->hasRepeatedLetter('abb'));
    }

    public function testNiceLongString()
    {
        $this->assertTrue($this->day5->isNiceString('qjhvhtzxzqqjkmpb'));
    }

    public function testNiceShortString()
    {
        $this->assertTrue($this->day5->isNiceString('xxyxx'));
    }

    public function testNaughtyLongStringWithoutRepeatedLetter()
    {
        $this->assertFalse($this->day5->isNiceString('uurcxstgmygtbstg'));
    }

    public function testNaughtyLongStringWithoutPair()
    {
        $this->assertFalse($this->day5->isNiceString('ieodomkazucvgmuy'));
    }

    public function testMultiStrings()
    {
        $this->day5->addStrings('qjhvhtzxzqqjkmpb
        xxyxx
        uurcxstgmygtbstg
        ieodomkazucvgmuy');
        $this->assertEquals(2, $this->day5->countNiceStrings());
    }
}
