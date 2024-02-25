<?php

require __DIR__ . '/../index.php';
require APP_DIR . 'classes/Worker.php';
require APP_DIR . 'enums/WorkPositions.php';
require APP_DIR . 'enums/Priority.php';

try {
    $taskList = new TaskTracker("tasks.txt");
} catch (error) {
    echo "ERROR!!!!!";
    exit;
}