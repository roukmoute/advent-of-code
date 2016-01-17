<?php
namespace AdventOfCode\Day4;

class Test extends \PHPUnit_Framework_TestCase
{
    /** @var Day4 */
    private $day4;

    public function setUp()
    {
        $this->day4 = new Day4();
    }

    public function testMineSecretKeyabcdef()
    {
        $this->day4->setNumberOfZeroes(5);
        $this->day4->setSecretKey('abcdef');
        $this->assertEquals(609043, $this->day4->mine());
    }

    public function testMineSecretKeypqrstuv()
    {
        $this->day4->setNumberOfZeroes(5);
        $this->day4->setSecretKey('pqrstuv');
        $this->assertEquals(1048970, $this->day4->mine());
    }
}
