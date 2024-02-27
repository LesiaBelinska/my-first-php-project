<?php

enum TaskStatus: string
{
    case COMPLETED = "completed";
    case NOT_COMPLETED = "not completed";

    public static function values(): array
    {
        $cases = self::cases();
        return array_column($cases, 'value');
    }
}