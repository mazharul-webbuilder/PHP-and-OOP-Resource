<?php
spl_autoload_register(function ($className){
    require_once("$className.php");
});

$reactangle = new Rectangle(20, 20);
echo "Area of Rectangle Is: " . $reactangle->calculateArea() . PHP_EOL;



$triangle = new Triangle();
$triangle->setBase(20);
$triangle->setHeight(20);
echo "Area of Triangle Is: " .$triangle->calculateArea();

