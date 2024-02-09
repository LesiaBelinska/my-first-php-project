<?php
declare(strict_types=1);
/**
 * This function generates a sequence of Fibonacci numbers
 * up to a specified maximum value.
 * @param int $max Maximum value in the sequence (default 100)
 * @return Generator
 */
function generateFibonacciSequence(int $max = 100): Generator
{
    $previous = 0;
    $current = 1;

    yield $previous;

    while ($current <= $max) {
        yield $current;
        $next = $previous + $current;
        $previous = $current;
        $current = $next;
    }
}

$numbers = generateFibonacciSequence();

foreach ($numbers as $number) {
    echo $number . PHP_EOL;
}