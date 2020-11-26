<?php
use AdventOfCode\Day5\Day5A;

class ATest extends \PHPUnit_Framework_TestCase
{
    /** @var Day5A */
    private $day5;

    public function setUp()
    {
        $this->day5 = new Day5A();
    }

    public function testContainThreeVowel()
    {
        $this->assertTrue($this->day5->hasThreeVowels('aei'));
    }

    public function testContainNoVowel()
    {
        $this->assertFalse($this->day5->hasThreeVowels('bcd'));
    }

    public function testContainLeastThreeVowels()
    {
        $this->assertTrue($this->day5->hasThreeVowels('xazegov'));
    }

    public function testContainsOnlyOneVowel()
    {
        $this->assertFalse($this->day5->hasThreeVowels('dvszwmarrgswjxmb'));
    }

    public function testHasDoubleLetter()
    {
        $this->assertTrue($this->day5->hasTwiceLetter('jchzalrnummnmhp'));
    }

    public function testHasNoDoubleLetter()
    {
        $this->assertFalse($this->day5->hasTwiceLetter('jchzalrnumimnmhp'));
    }

    public function testNotContainSpecialStrings()
    {
        $this->assertFalse($this->day5->hasSpecialStrings('haegwjzuvuyypxu'));
    }

    public function testContainSpecialStrings()
    {
        $this->assertTrue($this->day5->hasSpecialStrings('haegwjzuvuyypxyu'));
    }

    public function testNiceString()
    {
        $this->assertTrue($this->day5->isNiceString('ugknbfddgicrmopn'));
    }

    public function testNiceShortString()
    {
        $this->assertTrue($this->day5->isNiceString('aaa'));
    }

    public function testNaughtyString()
    {
        $this->assertFalse($this->day5->isNiceString('dvszwmarrgswjxmb'));
    }

    public function testWithMultiStrings()
    {
        $this->day5->addStrings('ugknbfddgicrmopn
        jchzalrnumimnmhp');
        $this->assertEquals(1, $this->day5->countNiceStrings());
    }

    public function testWithMultiStringsAndWithoutNiceString()
    {
        $this->day5->addStrings('haegwjzuvuyypxyu
        dvszwmarrgswjxmb');
        $this->assertEquals(0, $this->day5->countNiceStrings());
    }
}
