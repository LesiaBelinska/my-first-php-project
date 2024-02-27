<?php

require __DIR__ . '/../index.php';
require APP_DIR . 'classes/Figure.php';
require APP_DIR . 'classes/Rectangle.php';
require APP_DIR . 'classes/Circle.php';
require APP_DIR . 'functions.php';

$rectangle = null;
$circle = null;

try {
    $rectangle = new Rectangle(9.5, 5);
} catch (Exception $exception) {
    echo $exception->getMessage();
}

try {
    $circle = new Circle(8);
} catch (Exception $exception) {
    echo $exception->getMessage();
}

if($rectangle){
    showFigureDetails($rectangle);
}

if($circle){
    showFigureDetails($circle);
}