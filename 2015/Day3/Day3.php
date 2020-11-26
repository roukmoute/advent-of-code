<?php
namespace AdventOfCode\Day3;

class Day3
{
    private $housesVisited;
    private $gridOfHouses;
    private $robot;

    private function selectMove($move, $moveHorizontal, $moveVertical)
    {
        if ($move === '>' || $move === '<') {
            $moveHorizontal = $this->moveHorizontal($move, $moveHorizontal);
        } else {
            $moveVertical = $this->moveVertical($move, $moveVertical);
        }

        return array($moveHorizontal, $moveVertical);
    }

    private function moveHorizontal($move, $moveHorizontal)
    {
        if ($move === '>') {
            $moveHorizontal++;
        } else {
            $moveHorizontal--;
        }

        return $moveHorizontal;
    }

    private function moveVertical($move, $moveVertical)
    {
        if ($move === '^') {
            $moveVertical++;
        } else {
            $moveVertical--;
        }

        return $moveVertical;
    }

    private function setupGridOfHouses()
    {
        return [0 => [0 => true]];
    }

    private function selectCharacter($i)
    {
        return $i % 2 === 0 ? 'Santa' : 'Robo-Santa';
    }

    private function setupMovesForCharacters()
    {
        $moveDirections = [
            'Santa'      => ['horizontal' => 0, 'vertical' => 0],
            'Robo-Santa' => ['horizontal' => 0, 'vertical' => 0],
        ];

        return $moveDirections;
    }

    private function hasRobot()
    {
        return $this->robot == true;
    }


    public function __construct()
    {
        $this->robot         = false;
        $this->housesVisited = 1;
        $this->gridOfHouses  = $this->setupGridOfHouses();
    }

    public function move($moves)
    {
        $nbMoves        = strlen($moves);
        $moveHorizontal = 0;
        $moveVertical   = 0;
        $gridOfHouse    = $this->gridOfHouses;
        if ($this->hasRobot()) {
            $moveDirections    = $this->setupMovesForCharacters();
            $gridOfHouseGlobal = $this->gridOfHouses;
        }
        for ($i = 0; $i < $nbMoves; $i++) {
            $move = $moves[$i];
            if ($this->hasRobot()) {
                $character      = $this->selectCharacter($i);
                $moveHorizontal = &$moveDirections[$character]['horizontal'];
                $moveVertical   = &$moveDirections[$character]['vertical'];
                $gridOfHouse    = $this->gridOfHouses[$character];
            }
            list($moveHorizontal, $moveVertical) = $this->selectMove($move, $moveHorizontal, $moveVertical);
            if (!isset($gridOfHouse[$moveHorizontal][$moveVertical])) {
                $gridOfHouse[$moveHorizontal][$moveVertical] = true;
                if ($this->hasRobot()) {
                    if (!isset($gridOfHouseGlobal[$moveHorizontal][$moveVertical])) {
                        $gridOfHouseGlobal[$moveHorizontal][$moveVertical] = true;
                        $this->housesVisited++;
                    }
                } else {
                    $this->housesVisited++;
                }
            }
        }
    }

    public function getHousesVisited()
    {
        return $this->housesVisited;
    }

    public function activeRobot()
    {
        $this->robot         = true;
        $this->housesVisited = 1;
        $this->gridOfHouses  = ['Santa' => $this->setupGridOfHouses(), 'Robo-Santa' => $this->setupGridOfHouses()];
    }
}
