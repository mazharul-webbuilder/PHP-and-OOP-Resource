<?php

class Employee extends Person
{
    protected int|float $salary;
    protected string $position;

    public function __construct($name, $salary, $position)
    {
        parent::__construct($name);
        $this->salary = $salary;
        $this->position = $position;
    }

    public function displayEmployeeDetails(): void
    {
        echo "Employee Name $this->name" . PHP_EOL;
        echo "Position $this->position" . PHP_EOL;
        echo "Salary $this->salary" . PHP_EOL;
    }

}