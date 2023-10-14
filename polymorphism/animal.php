<?php

interface Animal
{
    public function makeSound();
}

class Dog implements Animal
{
    public function makeSound(): void
    {
        echo 'Dog bruck wo wo' . PHP_EOL;
    }
}

class Cat implements Animal
{
    public function makeSound(): void
    {
        echo 'Cat burks meow meow' . PHP_EOL;
    }
}

$dog = new Dog();
$dog->makeSound();



$cat = new Cat();
$cat->makeSound();