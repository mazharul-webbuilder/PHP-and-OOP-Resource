<?php

class Bird extends Animal
{

    public function eat(): void
    {
        echo "Bird eat insect" . PHP_EOL;
    }

    public function makeSound(): void
    {
        echo "Bird sounds cook cook" . PHP_EOL;
    }
}