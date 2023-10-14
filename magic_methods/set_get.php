<?php

class Student
{
    private int $id;
    private string $name;

    public function __set(string $name, $value): void
    {
        echo "Set methods is not found". PHP_EOL;

        echo $name;
        echo $value;
    }

    public function __get(string $name)
    {
        echo 'get methods is not found so this is called' . PHP_EOL;

        echo $name;
    }

}

$student = new Student();
$student->id = "test"; // will call __set method
echo $student->id; //will call __get method