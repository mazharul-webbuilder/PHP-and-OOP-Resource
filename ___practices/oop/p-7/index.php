<?php

spl_autoload_register(function ($className){
    require_once ("$className.php");
});

$student1 = new Student("Mazharul", 25, 3.49);
$student1->displayStudentInfo();