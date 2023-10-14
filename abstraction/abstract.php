<?php

abstract class Company
{
    protected $name;

    public function getName()
    {
        return $this->name;
    }
    public function setName($name): void
    {
        $this->name = $name;
    }

    public abstract function setExpert($subject);
}

class Employee extends Company
{
    public function setExpert($subject): void
    {
        echo "Employee is expert on  $subject field in this company: $this->name";
    }
}

$employee1 = new Employee();
$employee1->setName('Spark Engineering');
$employee1->setExpert('CSE');