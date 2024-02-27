<?php

class TaskTracker
{
    private array $tasks = [];
    private string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
        $this->loadTasksFromFile();
    }

    public function __destruct()
    {
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
    }

    public function deleteTask($taskId)
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
        uasort($tasks, array($this, 'sortByPriority'));

        print_r($tasks);
        return $tasks;
    }

    public function completeTask($taskId)
    {
        if (isset($this->tasks[$taskId])) {
            $this->tasks[$taskId]['status'] = TaskStatus::COMPLETED->value;
            $this->writeTaskToFile();
            return true;
        }
        return false;
    }

    private function loadTasksFromFile(): void
    {
        $fileContent = file_get_contents($this->fileName);
        $tasks = [];
        if ($fileContent !== false) {
            $lines = explode("\n", $fileContent);
            foreach ($lines as $line) {
                $data = explode("|", $line);
                if (count($data) === 4) { // Поправлено на 4, бо 4 значення в записі
                    $tasks[$data[0]] = [
                        'taskName' => $data[1],
                        'priority' => $data[2],
                        'status' => $data[3],
                    ];
                }
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
        file_put_contents($this->fileName, $fileContent);
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

//    public function displayTasks(): void
//    {
//        $tasks = $this->getTasks();
//        foreach ($tasks as $taskId => $task) {
//            echo "Task ID: $taskId\n";
//            echo "Task Name: {$task['taskName']}\n";
//            echo "Priority: {$task['priority']}\n";
//            echo "Status: {$task['status']}\n";
//            echo "-----------------------------\n";
//        }
//    }
}

