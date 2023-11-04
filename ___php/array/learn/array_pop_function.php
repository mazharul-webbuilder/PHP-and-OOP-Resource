<?php

//array_pop(): Removes and returns the last element from an array.

$person = array(
    "first_name" => "Jon",
    "last_name" => "Doe",
    "email" => "test.demo.com",
    "garbage" => "This value will be removed by array_pop() function"
);

print_r($person);

array_pop($person);

print_r($person);