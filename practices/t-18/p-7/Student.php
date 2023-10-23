<?php
declare(strict_types=1);

class Student
{
    protected string $name;
    protected int $age;
    protected mixed $grade;

    public function __construct(string $name, int $age, mixed $grade)
    {
        $this->name = $name;
        $this->age = $age;
        $this->grade = $grade;
    }

    /**
     * Show Student Information
    */
    public function displayStudentInfo(): void
    {
        echo "Student Name $this->name" . PHP_EOL;
        echo "Student Age $this->age" . PHP_EOL;
        echo "Student Grade $this->grade" . PHP_EOL;
    }

}