<?php

class ArrayReference
{
    private array $tasks = [];

    public function getTasks(): array
    {
        return $this->tasks;
    }

    public function setTasks(mixed $tasks): void
    {
        $this->tasks[] = &$tasks;
    }

    public function getTask(int $value): array
    {
        return array_filter($this->tasks, function ($task) use ($value) {
            return $task === $value;
        });
    }

    public function updateTask(int $value): void
    {
        $task = $this->getTask($value);

        var_dump($task[0] = 15);
        echo '<br>';
        var_dump($this->tasks);
    }

}


$obj = new ArrayReference();
var_dump($obj->getTasks());
echo "<br>";

$obj->setTasks(5);

var_dump($obj->getTasks());

echo "<br>";

var_dump($obj->getTask(55));

echo "<br>";

$obj->updateTask( 5);