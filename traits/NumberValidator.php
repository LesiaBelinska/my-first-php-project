<?php

trait NumberValidator
{
    public static function validateNumber(int|float|string $value): bool
    {
        return is_numeric($value) && $value >= 0;
    }
}