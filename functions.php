<?php
declare(strict_types=1);

/**
 * This function can read files
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
 * @param string $fileName
 * @return string|null
 */
function fileReadLastLine(string $fileName): ?string
{
    $file = fopen($fileName, 'r');
    $lastLine = null;
    while (($line = fgets($file)) !== false) {
        $lastLine = $line;
    }
    fclose($file);
    return $lastLine;
}

/**
 * @param string $fileName
 * @return string|null
 */
function fileReadLastLine2(string $fileName): ?string
{
    if (file_exists($fileName)) {
        $lines = file($fileName);
        return end($lines);
    }
    return null;
}


/**
 * @param string $fileName
 * @param string $message
 * @return void
 */
function fileAddContent(string $fileName, string $message): void
{
    file_put_contents($fileName, $message . "\n", FILE_APPEND);
}


