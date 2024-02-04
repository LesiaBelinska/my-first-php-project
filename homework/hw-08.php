<?php

function createRandSArray(int $length = 20, int $min = 1, int $max = 100): array
{
    $array = [];
    for ($i = 0; $i < $length; $i++) {
        $array[] = rand($min, $max);
    }
    return $array;
}

$randArray = createRandSArray();

//$minNumberInArray = min($randArray);
//$maxNumberInArray = max($randArray);

$minNumberInArray = $randArray[0];
$maxNumberInArray = $randArray[0];

foreach ($randArray as $number) {
    if ($number < $minNumberInArray) {
        $minNumberInArray = $number;
    }
    if ($number > $maxNumberInArray) {
        $maxNumberInArray = $number;
    }
}

var_dump($minNumberInArray);
var_dump($maxNumberInArray);

asort($randArray);
var_dump($randArray);