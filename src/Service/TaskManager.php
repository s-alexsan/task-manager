<?php

namespace SAlexsan\TaskManager\Model;

use SAlexsan\TaskManager\Model\Task;

class TaskManager
{
    private array $listOfTask;

    public function addTasks(Task $taks): void
    {
        $this->listOfTask[$taks->getId()] = $taks;
    }

    public function removeTask(int $id): void
    {
        unset($listOfTask[$id]);
    }

    public function getTaskById(int $id): Task 
    {
        return $this->listOfTask[$id];
    }

    public function listTasks(): array
    {
        return $this->listOfTask;
    }

    public function listTasksByStatus(string $status): array
    {
        return array_filter(
            $this->listOfTask, 
            function(int $id, Task $task) use ($status) {
                return $task->getStatus() == $status;
            }, 
            ARRAY_FILTER_USE_BOTH
        );
    }
}