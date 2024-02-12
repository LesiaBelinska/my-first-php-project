<?php

require_once 'system/functions.php';

$fileName = 'system/text.txt';
//$fileSize = filesize($fileName);
//$file = fopen($fileName, 'a');
//fwrite($file, 'Hello jadh');
//$file = fopen($fileName, 'r');
//$content = fread($file, $fileSize);
//fclose($file);

$contents = fileReadContentGenerator($fileName);

foreach ($contents as $content) {
    echo $content . PHP_EOL;
}

$message = trim(fgets(STDIN));
fileAddContent($fileName, $message);


