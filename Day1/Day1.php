<?php
namespace AdventOfCode\Day1;

class Day1
{
    const BASEMENT = -1;
    private $floor;
    private $savePositionToEnterTheBasement;
    private $firstPositionToEnterTheBasement;
    private $hasFindingFirstPositionToEnterTheBasement;

    public function __construct()
    {
        $this->floor                                     = 0;
        $this->firstPositionToEnterTheBasement           = 0;
        $this->savePositionToEnterTheBasement            = false;
        $this->hasFindingFirstPositionToEnterTheBasement = false;
    }

    public function getFloor()
    {
        return $this->floor;
    }

    public function addOpeningParenthesis()
    {
        $this->floor++;
        $this->setPositionBasement();
    }

    public function addClosingParenthesis()
    {
        $this->floor--;
        $this->setPositionBasement();
    }

    public function setParenthesis($string)
    {
        if ($string === '(') {
            $this->addOpeningParenthesis();
        } elseif ($string === ')') {
            $this->addClosingParenthesis();
        }
    }

    public function stringOfParenthesis($string)
    {
        $strLen = strlen($string);
        for ($i = 0; $i != $strLen; $i++) {
            $this->setParenthesis($string[$i]);
        }
    }

    public function activeTheFirstPositionToEnterTheBasement()
    {
        $this->savePositionToEnterTheBasement = true;
    }

    public function getPositionToEnterTheBasement()
    {
        return $this->firstPositionToEnterTheBasement;
    }

    private function setPositionBasement()
    {
        if ($this->savePositionToEnterTheBasement && !$this->hasFindingFirstPositionToEnterTheBasement) {
            $this->firstPositionToEnterTheBasement++;
            if ($this->floor === self::BASEMENT) {
                $this->hasFindingFirstPositionToEnterTheBasement = true;
            }
        }
    }
}
