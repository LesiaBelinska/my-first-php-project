<?php
declare(strict_types=1);
/**
 * This function calculates the product of $number1 and $number2
 * and returns the result as an integer or float.
 * Additionally, if the $callback parameter is provided as an anonymous function (closure),
 * it calls that function and passes the computed result to it.
 * @param int|float $number1
 * @param int|float $number2
 * @param Closure|null $callback
 * @return int|float
 */
function multiplyResult(int|float $number1, int|float $number2, ?Closure $callback = null): int|float
{
    $result = $number1 * $number2;

    if (isset($callback)) {
        $callback($result);
    }
    return $result;
}

$number1 = 3;
$number2 = 3;

$withCallback = multiplyResult($number1, $number2, function (int $result): void {
    echo "Result: $result" . PHP_EOL;
});
$withoutCallback = multiplyResult($number1, $number2);

echo $withoutCallback . PHP_EOL;
