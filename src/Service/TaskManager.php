<?php

namespace SAlexsan\TaskManager\Service;

use SAlexsan\TaskManager\Model\Task;

class TaskManager
{
    private array $listOfTask;

    public function addTask(Task $task): bool
    {
        try {
            $this->listOfTask[$task->getId()] = $task;
        } catch (\Throwable $th) {
            return false;
        }

        return true;
    }

    public function removeTask(string $id): bool
    {
        if(isset($this->listOfTask[$id])) {
            unset($this->listOfTask[$id]);
            return true;
        }

        return false;
    }

    public function getTaskById(string $id): Task 
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
            function(Task $task) use ($status) {
                return $task->getStatus() == $status;
            }
        );
    }
}