<?php

enum Priority: string
{
    case LOW = "low";
    case MIDDLE = "middle";
    case HIGH = "high";

    public static function values(): array
    {
        $cases = self::cases();
        return array_column($cases, 'value');
    }
}