<?php

namespace Roukmoute\AdventOfCode2022\Day1;

class Elf
{
    private array $calories;

    public function __construct(array $calories)
    {
        $this->calories = $calories;
    }

    public function countNumberOfCalories(): int
    {
        $total = 0;
        foreach ($this->calories as $calory) {
            $total += (int) $calory;
        }

        return $total;
    }
}
