<?php

namespace Roukmoute\AdventOfCode2023\Day1;

class Day1
{
    public function findFirstDigit(string $value): int
    {
        for ($i = 0; $i < strlen($value); $i++) {
            if (is_numeric($value[$i])) {
                return (int) $value[$i];
            }
        }

        return 0;
    }

    public function findLastDigit(string $value): int
    {
        for ($i = strlen($value) - 1; $i >= 0; $i--) {
            if (is_numeric($value[$i])) {
                return (int) $value[$i];
            }
        }

        return 0;
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
