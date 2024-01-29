<?php

echo "Hello! please, enter your name below" . PHP_EOL;
$userName = trim(fgets(STDIN));
$uppercaseUserName = strtoupper($userName);
echo "Hi $uppercaseUserName Nice to meet you!" . PHP_EOL;
echo "I am your first console program,";
echo "and I already know how to do some things, for example," . PHP_EOL;
echo "calculate the arithmetic mean of the numbers you enter." . PHP_EOL;
echo "Enter the first number below." . PHP_EOL;
$firstNumber = trim(fgets(STDIN));
echo "Please, enter the second number" .PHP_EOL;
$secondNumber = trim(fgets(STDIN));
echo "Please, enter the third number" .PHP_EOL;
$thirdNumber = trim(fgets(STDIN));
$sum = (float)$firstNumber + (float)$secondNumber + (float)$thirdNumber;
$average = round($sum / 3, 2);
echo "You entered: $firstNumber, $secondNumber, $thirdNumber" . PHP_EOL . "sum: $sum" .PHP_EOL . "average: $average" . PHP_EOL;
echo "See you soon. Have a nice day!" . PHP_EOL;