<?php

spl_autoload_register(function ($className){
    require_once ("$className.php");
});


$product1 = new Product("Desktop", 1200);
$product2 = new Product("Laptop", 1000);

$result = $product1->compareTo($product2);

