<?php

class TaskList {
    private $tasks = [];

    public function __construct() {
        $this->loadTasksFromFile();
    }

    public function addTask($taskName, $priority) {
        $taskId = uniqid();
        $this->tasks[$taskId] = [
            'name' => $taskName,
            'priority' => $priority->value,
            'status' => TaskStatus::NOT_COMPLETED
        ];
        $this->saveTasksToFile();
    }

    public function deleteTask($taskId) {
        if (isset($this->tasks[$taskId])) {
            unset($this->tasks[$taskId]);
            $this->saveTasksToFile();
        }
    }

    public function getTasks() {
        $tasks = $this->tasks;
        usort($tasks, function ($a, $b) {
            return $b['priority'] <=> $a['priority'];
        });
        return $tasks;
    }

    public function completeTask($taskId) {
        if (isset($this->tasks[$taskId])) {
            $this->tasks[$taskId]['status'] = TaskStatus::COMPLETED;
            $this->saveTasksToFile();
        }
    }

    private function loadTasksFromFile() {
        if (file_exists('tasks.json')) {
            $tasksJson = file_get_contents('tasks.json');
            $this->tasks = json_decode($tasksJson, true);
        }
    }

    private function saveTasksToFile() {
        $tasksJson = json_encode($this->tasks);
        file_put_contents('tasks.json', $tasksJson);
    }
}