<?php

class TaskTracker
{
    private array $tasks = [];
    private string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
        if(file_exists($this->fileName)){
            $this->tasks = $this->readTaskFromFile();
        }
    }

    public function __destruct()
    {
//        file_put_contents($this->fileName, ""); // додала!!!!!
        $this->writeTaskToFile();
    }

    public function addTask($taskName, $priority): void
    {
        $taskId = uniqid();
        $this->tasks[$taskId] = [
            'taskName' => $taskName,
            'priority' => $priority->value,
            'status' => TaskStatus::NOT_COMPLETED->value,
        ];
//        $this->writeTaskToFile();  // не потрібно якщо є destruct
    }

    public function deleteTask($taskId): bool
    {
        if (isset($this->tasks[$taskId])) {
            unset($this->tasks[$taskId]);
            $this->writeTaskToFile();
            return true;
        }
        return false;
    }

    /**
     * @return array
     */
    public function getTasks(): array
    {
        $tasks = $this->tasks;
        usort($tasks, array($this, 'sortByPriority'));
        return $tasks;
    }

    public function completeTask($taskId): bool
    {
        if (isset($this->tasks[$taskId])) {
            $this->tasks[$taskId]['status'] = TaskStatus::COMPLETED->value;
            $this->writeTaskToFile();
            return true;
        }
        return false;
    }

    private function readTaskFromFile(): array
    {
        $fileContent = file_get_contents($this->fileName);
        $tasks = [];
        if ($fileContent !== false) {
            $lines = explode("\n", $fileContent);
            foreach ($lines as $line) {
                $data = explode("|", $line);
                if (count($data) === 3) {
                    $tasks[$data[0]] = [
                        'taskName' => $data[1],
                        'priority' => $data[2],
//                        'status' => TaskStatus::NOT_COMPLETED->value,
                        'status' => $data[3],
                    ];
                }
            }
        }
        return $tasks;
    }

    private function writeTaskToFile(): void
    {
        $fileContent = "";
        foreach ($this->tasks as $taskId => $task) {
            $fileContent .= "$taskId|{$task['taskName']}|{$task['priority']}|{$task['status']}\n";
        }
        file_put_contents($this->fileName, $fileContent, FILE_APPEND);
//        file_put_contents($this->fileName, $fileContent);
    }

    private function sortByPriority($a, $b): int
    {
        $priorityOrder = [
            'low' => 1,
            'middle' => 2,
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

