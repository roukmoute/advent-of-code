<?php
namespace AdventOfCode\Day4;

class Day4
{
    private $secretKey;
    private $nbZeroes;

    public function setSecretKey($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    public function setNumberOfZeroes($nbZeroes)
    {
        $this->nbZeroes = $nbZeroes;
    }

    public function mine()
    {
        $i = 0;
        $strZeroes = str_repeat('0', $this->nbZeroes);
        do {
            $i++;
            $mining = $this->secretKey . (string)$i;
            $result = md5($mining);
        } while (substr($result, 0, $this->nbZeroes) !== $strZeroes);

        return $i;
    }
}
