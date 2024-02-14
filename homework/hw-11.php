<?php
require_once __DIR__ . '/../index.php';
require_once  APP_DIR . 'functions.php';

$fileName = APP_DIR . 'text.txt';

$contents = fileReadContentGenerator($fileName);

foreach ($contents as $content) {
    echo $content . PHP_EOL;
}

echo 'Enter your message below' . PHP_EOL;
$message = trim(fgets(STDIN));
fileAddContent($fileName, $message);

Logger('call homework-11 file', 'action');
