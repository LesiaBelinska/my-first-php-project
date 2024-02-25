<?php

require __DIR__ . '/../index.php';
require APP_DIR . 'classes/TaskTracker.php';
require APP_DIR . 'enums/TaskStatus.php';
require APP_DIR . 'enums/Priority.php';

$fileName = APP_DIR . 'files/tasks.txt';

try {
    $taskList = new TaskTracker($fileName);
} catch (error) {
    echo "ERROR!!!!!" . PHP_EOL;
    exit;
}

$taskList->addTask("do homework", Priority::HIGH);
$taskList->addTask("buy coffee", Priority::LOW);
$taskList->addTask("buy tickets to London", Priority::MIDDLE);
$taskList->addTask("go to the gym", Priority::MIDDLE);
$taskList->addTask("call to mom", Priority::LOW);
$taskList->addTask("do donate", Priority::HIGH);
$taskList->completeTask('');
$taskList->deleteTask('');

$myTasks = $taskList->getTasks();
$taskList->displayTasks($myTasks);



