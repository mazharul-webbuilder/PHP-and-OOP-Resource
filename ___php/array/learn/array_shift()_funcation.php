<?php

$person = array(
    "first_name" => "John",
    "last_name" => "Doe",
    "age" => 30
);

print_r($person);

$first_element_which_is_remove = array_shift($person);

print_r($person); // array first element will not present in this array