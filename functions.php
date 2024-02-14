<?php
declare(strict_types=1);

function fileReadContentGenerator(string $fileName): Generator
{
    $file = fopen($fileName, 'r');
    $fileSize = filesize($fileName);
    $content = fread($file, $fileSize);
    fclose($file);
    yield $content;
}

function fileAddContent(string $fileName, string $message): void
{
    $file = fopen($fileName, 'a');
    fwrite($file, $message . "\n");
    fclose($file);
}

function Logger(string $message, string $type, string $file = LOG_FILE): bool
{

    $filePath = LOG_DIR . $file;

    $date = date('d-M-Y H:i:s');
    $message = "[$type][$date][$message]" . PHP_EOL;

    $file = fopen($filePath, 'a+'); // спробувати file_put_contents
    $result = fwrite($file, $message);
    fclose($file);

    return (bool)$result;
}

