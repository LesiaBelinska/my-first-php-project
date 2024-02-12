<?php
declare(strict_types=1);
//function fileReadContentGenerator(string $fileName): Generator
//{
//    $file = fopen($fileName, 'r');
//    while(($line = fgets($file)) !== false) {
//        yield $line;
//    }
//    fclose($file);
//}

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



