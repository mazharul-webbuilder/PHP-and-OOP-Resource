<?php

spl_autoload_register(function ($className){
    require_once ("$className.php");
});

$book = new Book('The Power Of Habit', 'Afran Mahmud', 2023, "Personal Development");
$book->displayDetails();



$dvd = new DVD('The Power Of Habit', 'Afran Mahmud', 2023, 5.60);
$dvd->displayDetails();
