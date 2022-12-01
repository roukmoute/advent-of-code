<?php

namespace Roukmoute\AdventOfCode2022\Day1;

class Day1
{
    private const NEW_ITEM = "\n";
    private const NEW_ELF = "\n\n";

    /** @var Elf[] */
    private array $elves;

    public function __construct(string $input)
    {
        $this->elves = [];
        $this->createElves($input);
        $this->sortElvesByCalories();
    }

    public function countElves(): int
    {
        return count($this->elves);
    }

    public function totalCaloriesThatElfCarryingTheMostCalories(): int
    {
        return reset($this->elves)->countNumberOfCalories();
    }

    public function totalCaloriesFromThreeElvesCarryingTheMostCalories()
    {
        $total = 0;

        reset($this->elves);

        for ($i = 0; $i < 3; ++$i) {
            $total += current($this->elves)->countNumberOfCalories();
            next($this->elves);
        }

        return $total;
    }

    private function createElves(string $input): void
    {
        foreach (explode(self::NEW_ELF, $input) as $elf) {
            $calories = explode(self::NEW_ITEM, $elf);
            $this->elves[] = new Elf($calories);
        }
    }

    private function sortElvesByCalories(): void
    {
        uasort($this->elves, function (Elf $a, Elf $b) {
            $a = $a->countNumberOfCalories();
            $b = $b->countNumberOfCalories();

            if ($a === $b) {
                return 0;
            }
            return ($a > $b) ? -1 : 1;
        });
    }
}
