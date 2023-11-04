<?php

spl_autoload_register(function ($className){
    require_once ("$className.php");
});

$employee1 = new Employee("Jhon Doe", 30000, "Software Engineer");
$employee1->displayEmployeeDetails();