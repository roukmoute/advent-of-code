<?php
require_once __DIR__ . '/../vendor/autoload.php';

use AdventOfCode\Day4\Day4;

$input = 'ckczppom';

$day4 = new Day4();
$day4->setSecretKey($input);

$day4->setNumberOfZeroes(5);
printf("lowest number for 5 zeroes: %d\n", $day4->mine());

$day4->setNumberOfZeroes(6);
printf("lowest number for 6 zeroes: %d\n", $day4->mine());
