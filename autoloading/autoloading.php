<?php

spl_autoload_register(function ($classname){
    require_once ("$classname.php");
});

$file1 = new Files();
$file1->hello();

$file1 = new Database();
$file1->hello();