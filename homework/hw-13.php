<?php

require __DIR__ . '/../index.php';
require APP_DIR . 'classes/TaskTracker.php';
require APP_DIR . 'enums/TaskStatus.php';
require APP_DIR . 'enums/Priority.php';

$fileName = APP_DIR . 'files/tasks.txt';

$taskList = new TaskTracker($fileName);