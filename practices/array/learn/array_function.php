<?php

$myArray = array(); // create an empty array

$fruits = array('apple', 'banana', 'cherry'); // Creates array with 3 elements

$persons = array(
    "first_name" => "John",
    "last_name" => "Doe",
    "age" => 30
); // Creates an associate array with key-values pairs

echo count($myArray) . PHP_EOL;
echo strtoupper($fruits[1]) . PHP_EOL;
echo "Age of person is: " . strtolower($persons['age']);