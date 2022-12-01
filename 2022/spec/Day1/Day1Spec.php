<?php

namespace spec\Roukmoute\AdventOfCode2022\Day1;

use PhpSpec\ObjectBehavior;

class Day1Spec extends ObjectBehavior
{
    public function it_can_split_input_into_one_elf()
    {
        $this->beConstructedWith('11334');

        $this->countElves()->shouldBe(1);
    }

    public function it_can_split_input_into_two_elves()
    {
        $this->beConstructedWith('9318

1209');

        $this->countElves()->shouldBe(2);
    }

    public function it_can_split_input_into_four_elves()
    {
        $this->beConstructedWith('5604

15226
5377
14173

20230
2467
12544

1565
12373
');

        $this->countElves()->shouldBe(4);
    }

    public function it_finds_the_Elf_carrying_the_most_Calories_with_only_one_item()
    {
        $this->beConstructedWith('1

2

3

4
');

        $this->totalCaloriesThatElfCarryingTheMostCalories()->shouldBe(4);
    }

    public function it_finds_the_Elf_carrying_the_most_Calories_with_many_items()
    {
        $this->beConstructedWith('1
15

2
2

3
3

4
4
');

        $this->totalCaloriesThatElfCarryingTheMostCalories()->shouldBe(16);
    }

    public function it_test_with_real_example()
    {
        $this->beConstructedWith(file_get_contents(__DIR__ . '/input.txt'));

        $this->totalCaloriesThatElfCarryingTheMostCalories()->shouldBe(66186);
    }

    public function it_find_the_top_three_Elves_carrying_the_most_Calories_with_simple_items()
    {
        $this->beConstructedWith('1

2

3

4
');

        $this->totalCaloriesFromThreeElvesCarryingTheMostCalories()->shouldBe(9);
    }

    public function it_find_the_top_three_Elves_carrying_the_most_Calories_with_concrete_example()
    {
        $this->beConstructedWith(file_get_contents(__DIR__ . '/input.txt'));

        $this->totalCaloriesFromThreeElvesCarryingTheMostCalories()->shouldBe(196804);
    }
}
