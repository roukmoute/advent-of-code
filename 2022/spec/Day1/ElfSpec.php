<?php

namespace spec\Roukmoute\AdventOfCode2022\Day1;

use PhpSpec\ObjectBehavior;
use Roukmoute\AdventOfCode2022\Day1\Elf;

class ElfSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith([]);
        $this->shouldHaveType(Elf::class);
    }

    public function it_can_receives_1000_Calories_with_one_item()
    {
        $this->beConstructedWith([1000]);

        $this->countNumberOfCalories()->shouldBe(1000);
    }

    public function it_can_receives_1420_Calories_with_two_items()
    {
        $this->beConstructedWith([710,710]);

        $this->countNumberOfCalories()->shouldBe(1420);
    }
}
