<?php

require __DIR__ . '/../index.php';
require APP_DIR . 'classes/TextPrinter.php';
require APP_DIR . 'classes/UpperCaseTextPrinter.php';
require APP_DIR . 'functions.php';

try {
    $baseObject = new TextPrinter();
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . PHP_EOL;
    exit;
}

try {
    $subObject = new UpperCaseTextPrinter();
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . PHP_EOL;
    exit;
}

showText($baseObject);
showText($subObject);