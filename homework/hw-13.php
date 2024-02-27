<?php

require __DIR__ . '/../index.php';
require APP_DIR . 'classes/TaskTracker.php';
require APP_DIR . 'enums/TaskStatus.php';
require APP_DIR . 'enums/Priority.php';

$tasksFile = APP_DIR . 'files/tasks.txt';

try {
    $taskList = new TaskTracker($tasksFile);
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit;
}


$taskList->addTask("do homework", Priority::HIGH);
$taskList->addTask("buy coffee", Priority::LOW);
$taskList->addTask("go to the gym", Priority::MEDIUM);
$taskList->addTask("call to mom", Priority::LOW);
$taskList->addTask("do donate", Priority::HIGH);
$taskList->completeTask('65de08d1ca13c');
$taskList->deleteTask('65de08d1ca145');

$taskList->displayTasks();

