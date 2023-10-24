<?php

class Person
{
    protected string $name;
    protected int $age;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * This method will call if anybody try to echo any object
    */
    public function __toString(): string
    {
        return "This is Object of $this->name and Classname is Person";
    }

}

//Example
$person1 = new Person('Mazharul');
echo "$person1  ". PHP_EOL;