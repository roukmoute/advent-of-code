<?php
namespace AdventOfCode\Day5;

class Day5A
{
    const VOWELS = 'aeiou';

    private $strings;

    public function hasThreeVowels($string)
    {
        $nbVowels = 0;
        $strLen   = strlen($string);
        for ($i = 0; $i < $strLen; $i++) {
            if (strpos(self::VOWELS, $string[$i]) !== false) {
                $nbVowels++;
            }
        }

        return $nbVowels >= 3 ? true : false;
    }

    public function hasTwiceLetter($string)
    {
        $strLen = strlen($string);
        for ($i = 1; $i < $strLen; $i++) {
            if ($string[$i] === $string[$i - 1]) {
                return true;
            }
        }

        return false;
    }

    public function hasSpecialStrings($string)
    {
        $specialStrings = ['ab', 'cd', 'pq', 'xy'];
        $strLen         = strlen($string);
        for ($i = 1; $i < $strLen; $i++) {
            $chars = $string[$i - 1] . $string[$i];
            if (in_array($chars, $specialStrings)) {
                return true;
            }
        }

        return false;
    }

    public function isNiceString($string)
    {
        return $this->hasThreeVowels($string) && $this->hasTwiceLetter($string) && !$this->hasSpecialStrings($string);
    }

    public function addStrings($string)
    {
        $strings = explode("\n", $string);
        foreach ($strings as $string) {
            $this->strings[] = trim($string);
        }
    }

    public function countNiceStrings()
    {
        $niceStrings = 0;
        foreach ($this->strings as $string) {
            if ($this->isNiceString($string)) {
                $niceStrings++;
            }
        }

        return $niceStrings;
    }
}
