<?php
declare(strict_types=1);

/**
 * @param string $message
 * @param string $type
 * @param string $file
 * @return bool
 */
function Logger(string $message, string $type, string $file = LOG_FILE): bool
{

    $filePath = LOG_DIR . $file;

    $date = date('d-M-Y H:i:s');
    $message = "[$type][$date][$message]" . PHP_EOL;

    $file = fopen($filePath, 'a+');
    $result = fwrite($file, $message);
    fclose($file);

    return (bool)$result;
}