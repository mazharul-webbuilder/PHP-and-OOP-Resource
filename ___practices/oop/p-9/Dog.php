<?php

class Dog extends Animal
{

    public function eat(): void
    {
        echo "Dog Eat Meat" . PHP_EOL;
    }

    public function makeSound(): void
    {
        echo "Dog sound burk" . PHP_EOL;
    }
}