<?php
namespace AdventOfCode\Day2;

class Day2
{
    private $length;
    private $width;
    private $height;
    private $totalSquareFeet;
    private $totalFeetOfRibbon;

    private function addInTotalSquareFeet()
    {
        $this->totalSquareFeet += $this->getSquareFeet();
    }

    private function getTwoSmallestSides()
    {
        $dimensions             = [
            $this->length,
            $this->width,
            $this->height,
        ];
        $firstSmallestSide      = min($dimensions);
        $keyOfFirstSmallestSide = array_search($firstSmallestSide, $dimensions);
        unset($dimensions[$keyOfFirstSmallestSide]);
        $secondSmallestSide = min($dimensions);

        return array($firstSmallestSide, $secondSmallestSide);
    }

    private function addInTotalFeetOfRibbon()
    {
        $this->totalFeetOfRibbon += $this->getFeetOfRibbon();
    }

    public function __construct()
    {
        $this->totalSquareFeet   = 0;
        $this->totalFeetOfRibbon = 0;
    }

    public function setDimensions($string)
    {
        $dimensions   = explode('x', $string);
        $this->length = $dimensions[0];
        $this->width  = $dimensions[1];
        $this->height = $dimensions[2];
    }

    public function getSurface()
    {
        $surface = (2 * $this->length * $this->width)
            + (2 * $this->width * $this->height)
            + (2 * $this->height * $this->length);

        return $surface;
    }

    public function getExtraPaper()
    {
        $extraPaper = min(
            $this->length * $this->width,
            $this->width * $this->height,
            $this->height * $this->length
        );

        return $extraPaper;
    }

    public function getSquareFeet()
    {
        return $this->getSurface() + $this->getExtraPaper();
    }

    public function addDimensions($string)
    {
        $dimensions = explode("\n", $string);
        foreach ($dimensions as $dimension) {
            $dimension = trim($dimension);
            $this->setDimensions($dimension);
            $this->addInTotalSquareFeet();
            $this->addInTotalFeetOfRibbon();
        }
    }

    public function getTotalSquareFeet()
    {
        return $this->totalSquareFeet;
    }

    public function getFeetOfRibbon()
    {
        list($firstSmallestSide, $secondSmallestSide) = $this->getTwoSmallestSides();
        $ribbonForThePresent = $firstSmallestSide + $firstSmallestSide + $secondSmallestSide + $secondSmallestSide;
        $ribbonForTheBow     = $this->length * $this->width * $this->height;

        return $ribbonForThePresent + $ribbonForTheBow;
    }

    public function getTotalFeetOfRibbon()
    {
        return $this->totalFeetOfRibbon;
    }
}
