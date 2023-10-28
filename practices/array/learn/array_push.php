<?php

//Adds one or more elements to the end of an array.

$person = array(
    "first_name" => "John",
    "last_name" => "Doe",
    "age" => 30
);

array_push($person, "jhon@demo.com");

print_r($person);