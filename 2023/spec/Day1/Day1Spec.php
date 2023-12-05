<?php

namespace spec\Roukmoute\AdventOfCode2023\Day1;

use PhpSpec\ObjectBehavior;
use Roukmoute\AdventOfCode2023\Day1\Day1;

class Day1Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day1::class);
    }

    function it_should_found_first_digit()
    {
        $this->findFirstDigit('1abc2')->shouldReturn(1);
        $this->findFirstDigit('pqr3stu8vwx')->shouldReturn(3);
        $this->findFirstDigit('a1b2c3d4e5f')->shouldReturn(1);
        $this->findFirstDigit('treb7uchet')->shouldReturn(7);
    }

    function it_should_found_last_digit()
    {
        $this->findLastDigit('1abc2')->shouldReturn(2);
        $this->findLastDigit('pqr3stu8vwx')->shouldReturn(8);
        $this->findLastDigit('a1b2c3d4e5f')->shouldReturn(5);
        $this->findLastDigit('treb7uchet')->shouldReturn(7);
    }

    function it_should_form_a_single_two_digit_number()
    {
        $this->formSingleTwoDigitNumber('1abc2')->shouldReturn(12);
        $this->formSingleTwoDigitNumber('pqr3stu8vwx')->shouldReturn(38);
        $this->formSingleTwoDigitNumber('a1b2c3d4e5f')->shouldReturn(15);
        $this->formSingleTwoDigitNumber('treb7uchet')->shouldReturn(77);
    }

    function it_add_multiple_lines_together()
    {
        $this->addMultipleLinesTogether('1abc2', 'pqr3stu8vwx')->shouldReturn(50);
        $this->addMultipleLinesTogether('a1b2c3d4e5f', 'treb7uchet')->shouldReturn(92);
        $this->addMultipleLinesTogether('1abc2', 'pqr3stu8vwx', 'a1b2c3d4e5f', 'treb7uchet')->shouldReturn(142);
    }

    function it_should_sum_of_all_of_the_calibration_values()
    {
        $file = file_get_contents(dirname(__DIR__, 2) . '/src/Day1/input/day1.txt');
        $lines = explode("\n", $file);
        $this->addMultipleLinesTogether(...$lines)->shouldReturn(54573);
    }
}
