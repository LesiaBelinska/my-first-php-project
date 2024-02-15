<?php
declare(strict_types=1);

// for own experience
/**
 * This function takes a file name as input and returns a generator
 * that yields the content of the file if it exists.
 * @param string $fileName
 * @return Generator
 */

function fileReadContentGenerator(string $fileName): Generator
{
    if (file_exists($fileName)) {
        yield file_get_contents($fileName);
    }
}

/**
 * Function reads the content of a file and returns the last line of the file as a string.
 * If the file does not exist or is empty, it returns null.
 * @param string $fileName
 * @return string|null
 */
function fileReadLastLine(string $fileName): ?string
{
    if (file_exists($fileName)) {
        $file = fopen($fileName, 'r');
        $lastLine = null;
        while (($line = fgets($file)) !== false) {
            $lastLine = $line;
        }
        fclose($file);
        return $lastLine;
    }
    return null;
}

/**
 * Function appends the message to the end of the file specified by the file name.
 * @param string $fileName
 * @param string $message
 * @return void
 */
function fileAddContent(string $fileName, string $message): void
{
    if (file_exists($fileName)) {
        file_put_contents($fileName, $message . "\n", FILE_APPEND);
    }
}


