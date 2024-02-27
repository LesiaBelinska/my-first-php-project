<?php

class TaskTracker
{
    private array $tasks = [];
    private string $fileName;

    public function __construct(string $fileName)
    {
        if (!file_exists($fileName)) {
            throw new Exception("File $fileName does not exist.");
        }
        $this->fileName = $fileName;
        $this->loadTasksFromFile();
    }

    public function __destruct()
    {
        $this->writeTaskToFile();
    }

    public function addTask($taskName, $priority): void
    {
        if (!($priority instanceof Priority)) {
            throw new InvalidArgumentException("Priority must be an instance of Priority enum.");
        }
        $taskId = uniqid();
        $this->tasks[$taskId] = [
            'taskName' => $taskName,
            'priority' => $priority->value,
            'status' => TaskStatus::NOT_COMPLETED->value,
        ];
    }

    public function deleteTask($taskId)
    {
        if (!isset($this->tasks[$taskId])) {
            throw new InvalidArgumentException("Task with ID $taskId does not exist.");
        }
        unset($this->tasks[$taskId]);
        return true;
    }

    /**
     * @return array
     */
    public function getTasks(): array
    {
        $tasks = $this->tasks;
        uasort($tasks, array($this, 'sortByPriority'));

        return $tasks;
    }

    public function completeTask($taskId)
    {
        if (!isset($this->tasks[$taskId])) {
            throw new InvalidArgumentException("Task with ID $taskId does not exist.");
        }
        $this->tasks[$taskId]['status'] = TaskStatus::COMPLETED->value;
        return true;
    }

    private function loadTasksFromFile(): void
    {
        $fileContent = file_get_contents($this->fileName);
        if ($fileContent === false) {
            throw new Exception("Failed to load tasks from file.");
        }
        $tasks = [];
        $lines = explode("\n", $fileContent);
        foreach ($lines as $line) {
            $data = explode("|", $line);
            if (count($data) === 4) {
                $tasks[$data[0]] = [
                    'taskName' => $data[1],
                    'priority' => $data[2],
                    'status' => $data[3],
                ];
            }
        }
        $this->tasks = $tasks;
    }

    private function writeTaskToFile(): void
    {
        $fileContent = "";
        foreach ($this->tasks as $taskId => $task) {
            $fileContent .= "$taskId|{$task['taskName']}|{$task['priority']}|{$task['status']}\n";
        }
        $result = file_put_contents($this->fileName, $fileContent);
        if ($result === false) {
            throw new Exception("Failed to write tasks to file."); // Зміна: Додано перевірку на помилку запису в файл
        }
    }

    private function sortByPriority($a, $b): int
    {
        $priorityOrder = [
            'low' => 1,
            'medium' => 2,
            'high' => 3,
        ];
        return $priorityOrder[$b['priority']] - $priorityOrder[$a['priority']];
    }

    public function displayTasks(): void
    {
        $tasks = $this->getTasks();
        foreach ($tasks as $taskId => $task) {
            echo "Task ID: $taskId\n";
            echo "Task Name: {$task['taskName']}\n";
            echo "Priority: {$task['priority']}\n";
            echo "Status: {$task['status']}\n";
            echo "-----------------------------\n";
        }
    }
}

