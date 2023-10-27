<?php

spl_autoload_register(function ($className){
    require_once ("$className.php");
});

$square = new Square(55, 5485956);
echo "Resize square is: " . $square->resize() . PHP_EOL;