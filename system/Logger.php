<?php

class Logger
{
    /**
     * @param string $message
     * @param LogLevels $level
     * @param string $file
     * @return false|int
     */

    public static function log(string $message, LogLevels $level = LogLevels::ACTION, string $file = LOG_FILE): false|int
    {
        $method = $level->value;
        if ($method === 'action') {
            return self::action($message, $file);
        }

        return false;
    }

    public static function action(string $message, string $file = LOG_FILE): false|int
    {
        return self::write($message, LogLevels::ACTION, $file);
    }

    public static function error(string $message, string $file = LOG_FILE): false|int
    {
        return self::write($message, LogLevels::ERROR, $file);
    }

    private static function write(string $message, LogLevels $level = LogLevels::ACTION, string $file = LOG_FILE)
    {
        $filePath = LOG_DIR . $file;
        $date = date('d-m-Y H:i:s');
        $message = "[" . $level->value . "][$date][$message]" . PHP_EOL;

        return file_put_contents($filePath, $message, FILE_APPEND);
    }
}