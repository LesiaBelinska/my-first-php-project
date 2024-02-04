<?php
declare(strict_types=1);
function circleAreaCalculation(int|float $radius): int|float
{
    $pi = pi();

    $area = $radius * $pi;
    return $area;
}

$radius = 10;
$square = circleAreaCalculation($radius);

echo "Площа кола з радіусом $radius дорівнює $square." . PHP_EOL;


//переприсвоєння

function power(int|float &$number, int|float $pow): void
{
    $number **= $pow;
}

$number = 10;
power($number, pow: 2);

echo $number . PHP_EOL;


// повернення
function power2(int|float $number, int|float $pow): int|float
{
    return $number ** $pow;
}

$number = 5;
$number = power2($number, 3);

echo $number . PHP_EOL;
