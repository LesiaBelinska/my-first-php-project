<?php

enum Priority: string
{
    case LOW = "low";
    case MEDIUM = "medium";
    case HIGH = "high";

    public static function values(): array
    {
        $cases = self::cases();
        return array_column($cases, 'value');
    }
}