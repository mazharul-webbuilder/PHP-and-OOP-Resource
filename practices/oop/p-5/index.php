<?php

/*Autoload the class*/
spl_autoload_register(function ($clasName){
    require_once("$clasName.php");
});


$vehicle = new Vehicle( "bmw", "ZX-100",  "2018");
$vehicle->getVehicleDetails();


