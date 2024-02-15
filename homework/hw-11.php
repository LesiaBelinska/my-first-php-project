<?php
require_once __DIR__ . '/../index.php';
require_once  APP_DIR . 'functions.php';

$fileName = APP_DIR . 'hw-file.txt';

echo 'Enter your message below' . PHP_EOL;
$message = trim(fgets(STDIN));
fileAddContent($fileName, $message);

$lastLine = fileReadLastLine($fileName);
echo "You entered: $lastLine";

// for own experience
//$contents = fileReadContentGenerator($fileName);
//
//foreach ($contents as $content) {
//    echo $content . PHP_EOL;
//}