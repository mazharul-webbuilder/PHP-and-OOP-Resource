<?php

//array_unshift(): Adds one or more elements to the beginning of an array.

$fruits = array("apple", "banana");

array_unshift($fruits, "Mango", "Date");

print_r($fruits);