<?php

require __DIR__ . '/../index.php';
require APP_DIR . 'classes/TaskList.php';
require APP_DIR . 'enums/TaskStatus.php';
require APP_DIR . 'enums/Priority.php';

//$fileName = APP_DIR . 'files/tasks.txt';

$taskList = new TaskList();
$taskList->addTask('Подати звіт', Priority::MEDIUM());
$taskList->addTask('Заплатити за квартиру', Priority::LOW());
$taskList->addTask('Приготувати вечерю', Priority::HIGH());
$taskList->completeTask('1');
$tasks = $taskList->getTasks();

echo "Список завдань:\n";
foreach ($tasks as $task) {
    echo "{$task['name']} (пріоритет {$task['priority']}) - статус: {$task['status']}\n";
}

