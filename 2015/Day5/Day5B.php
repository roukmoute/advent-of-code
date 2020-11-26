<?php
namespace AdventOfCode\Day5;

class Day5B
{
    private $strings;

    public function hasPair($string)
    {
        $strLen = strlen($string);

        for ($i = 0; $i < $strLen - 2; $i++) {
            $pairOfLetters = substr($string, $i, 2);
            if (strpos(substr($string, $i + 2), $pairOfLetters) !== false) {
                return true;
            }
        }

        return false;
    }

    public function hasRepeatedLetter($string)
    {
        $strLen = strlen($string);

        for ($i = 0; $i < $strLen - 2; $i++) {
            if ($string[$i] === $string[$i + 2]) {
                return true;
            }
        }

        return false;
    }

    public function isNiceString($string)
    {
        return $this->hasPair($string) && $this->hasRepeatedLetter($string);
    }

    public function addStrings($strings)
    {
        $this->strings = explode("\n", $strings);
    }

    public function countNiceStrings()
    {
        $niceStrings = 0;

        foreach ($this->strings as $string) {
            if ($this->isNiceString(trim($string))) {
                $niceStrings++;
            }
        }

        return $niceStrings;
    }
}
