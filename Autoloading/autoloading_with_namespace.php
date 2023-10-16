<?php


spl_autoload_register(function ($classname){
    require_once ("$classname.php");
});

$file1 = new AutoloadNamespace\Files();
$file1->hello();

$file1 = new AutoloadNamespace\Database();
$file1->hello();