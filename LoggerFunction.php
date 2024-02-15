<?php
declare(strict_types=1);

/**
 * logs a message with a specified type to a log file.
 * It formats the message with the type, current date and time, and the provided message.
 * The log file is specified by the optional parameter file, with a default value of LOG_FILE.
 * It returns true if the logging operation is successful, and false otherwise.
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