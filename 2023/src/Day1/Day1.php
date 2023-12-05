<?php

namespace Roukmoute\AdventOfCode2023\Day1;

class Day1
{
    public function findFirstDigit(string $value): int
    {
        $letters = '';
        $i = -1;
        $maxLen = strlen($value);
        if ($maxLen === 0) {
            return 0;
        }
        while (++$i < $maxLen) {
            if (is_numeric($value[$i])) {
                return (int) $value[$i];
            }
            $letters .= $value[$i];

            if (preg_match('/one|two|three|four|five|six|seven|eight|nine/', $letters)) {
                $letters = str_replace(['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'], [1, 2, 3, 4, 5, 6, 7, 8, 9], $letters);

                return (int) filter_var($letters, FILTER_SANITIZE_NUMBER_INT);
            }
        }
    }

    public function findLastDigit(string $value): int
    {
        $letters = '';
        $i = strlen($value);
        if ($i === 0) {
            return 0;
        }
        while (--$i >= 0) {
            if (is_numeric($value[$i])) {
                return (int) $value[$i];
            }
            $letters = $value[$i].$letters;

            if (preg_match('/one|two|three|four|five|six|seven|eight|nine/', $letters)) {
                $letters = str_replace(['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'], [1, 2, 3, 4, 5, 6, 7, 8, 9], $letters);

                return (int) filter_var($letters, FILTER_SANITIZE_NUMBER_INT);
            }
        }
    }

    public function formSingleTwoDigitNumber($argument1)
    {
        $firstDigit = $this->findFirstDigit($argument1);
        $lastDigit = $this->findLastDigit($argument1);

        return $firstDigit * 10 + $lastDigit;
    }

    public function addMultipleLinesTogether(string ...$lines): int
    {
        $sum = 0;
        foreach ($lines as $line) {
            $sum += $this->formSingleTwoDigitNumber($line);
        }

        return $sum;
    }
}
