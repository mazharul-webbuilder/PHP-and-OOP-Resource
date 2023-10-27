<?php

spl_autoload_register(function ($clasName){
    require_once ("$clasName.php");
});

$dog = new Dog();
$cat = new Cat();
$bird = new Bird();

$dog->eat();
$dog->makeSound();