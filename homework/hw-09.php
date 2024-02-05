<?php

// 1. Виведіть на екран всі числа від 1 до 10 використовуючи цикл while

$i = 1;
while ($i <= 10) {
    echo $i . PHP_EOL;
    $i++;
}

// 2. Обчисліть факторіал числа 5 використовуючи цикл while.

$number = 5;
$factorial = 1;

while ($number > 1) {
    $factorial *= $number;
    $number--;
}
echo "Factorial of number 5 is $factorial." . PHP_EOL;

// 3. Виведіть на екран всі парні числа від 1 до 20 використовуючи цикл while.

// 3.1
$i = 2;
while ($i <= 20) {
    echo $i . PHP_EOL;
    $i += 2;
}

// 3.2
$i = 1;
while ($i <= 20) {
    if ($i % 2 == 0) {
        echo $i . PHP_EOL;
    }
    $i++;
}