<?php

require __DIR__ . '/../index.php';
require APP_DIR . 'classes/Figure.php';
require APP_DIR . 'classes/Rectangle.php';
require APP_DIR . 'classes/Circle.php';
require APP_DIR . 'functions.php';

try {
    $rectangle = new Rectangle(4.5, 2);
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit;
}

try {
    $circle = new Circle(8);
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit;
}

showFigureDetails($rectangle);
showFigureDetails($circle);