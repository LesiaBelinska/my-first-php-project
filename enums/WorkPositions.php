<?php

enum WorkPositions: string
{
    case MANAGER = "manager";
    case DEVELOPER = "developer";
    case TESTER = "tester";

    public static function values(): array
    {
        $cases = self::cases();

        return array_column($cases, 'value');
    }
}