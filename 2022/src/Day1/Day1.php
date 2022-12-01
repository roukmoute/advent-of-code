<?php

namespace Roukmoute\AdventOfCode2022\Day1;

class Day1
{
    /** @var Elf[] */
    private array $elves;

    public function __construct(string $input)
    {
        foreach (explode("\n\n", $input) as $elf) {
            $calories = explode("\n", $elf);
            $this->elves[] = new Elf($calories);
        }
    }

    public function countElves(): int
    {
        return count($this->elves);
    }

    public function totalCaloriesThatElfCarryingTheMostCalories()
    {
        $bigger = 0;

        foreach ($this->elves as $elf) {
            if ($elf->countNumberOfCalories() > $bigger) {
                $bigger = $elf->countNumberOfCalories();
            }
        }

        return $bigger;
    }
}
