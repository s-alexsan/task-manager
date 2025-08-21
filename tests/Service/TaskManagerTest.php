<?php

use PhpParser\Node\Expr\Cast\Object_;
use PHPUnit\Framework\TestCase;
use SAlexsan\TaskManager\Model\Task;
use SAlexsan\TaskManager\Service\TaskManager;

class TaskManagerTest extends TestCase
{

    public function testAddTask()
    {
        $task = new Task('PHP', 'Estudar PHP durante 1h todo dia');

        $taskManager = new TaskManager();
        $result = $taskManager->addTask($task);

        static::assertTrue($result);
        static::assertCount(1, $taskManager->listTasks());
        static::assertSame($task, $taskManager->getTaskById($task->getId()));
    }

    public function testRemoveTask()
    {
        $task = new Task('PHP', 'Estudar PHP durante 1h todo dia');

        $taskManager = new TaskManager();
        $taskManager->addTask($task);

        $id = $task->getId();

        $result = $taskManager->removeTask($id);

        static::assertTrue($result);
        static::assertCount(0, $taskManager->listTasks());
    }

    public function testRemoveNonExistentTask()
    {
        $taskManager = new TaskManager();

        $result = $taskManager->removeTask('999');

        static::assertFalse($result);
    }

    public function testListTasks()
    {
        $task1 = new Task('PHP', 'Estudar PHP');
        $task2 = new Task('Laravel', 'Estudar Laravel');

        $taskManager = new TaskManager();
        $taskManager->addTask($task1);
        $taskManager->addTask($task2);

        $tasks = $taskManager->listTasks();

        static::assertCount(2, $tasks);
        static::assertArrayHasKey($task1->getId(), $tasks);
        static::assertArrayHasKey($task2->getId(), $tasks);
    }

    public function testListTasksByStatus()
    {
        $task1 = new Task('PHP', 'Estudar PHP');
        $task2 = new Task('Laravel', 'Estudar Laravel');
        $task2->maskAsCompleted();
        $task3 = new Task('Docker', 'Estudar Docker');

        $taskManager = new TaskManager();
        $taskManager->addTask($task1);
        $taskManager->addTask($task2);
        $taskManager->addTask($task3);

        $pendingTasks = $taskManager->listTasksByStatus('pendente');

        static::assertCount(2, $pendingTasks);
        static::assertContains($task1, $pendingTasks);
        static::assertContains($task3, $pendingTasks);

        $doneTasks = $taskManager->listTasksByStatus('concluída');

        static::assertCount(1, $doneTasks);
        static::assertContains($task2, $doneTasks);
    }

}