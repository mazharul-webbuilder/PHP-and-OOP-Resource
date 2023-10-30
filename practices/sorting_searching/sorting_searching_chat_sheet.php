<?php

/**
 * list of PHP functions that are commonly used for sorting and searching in arrays.
 * For sorting arrays, we can use functions like:
*/
/*------------------------------------------------------------*/
//sort(): Sorts an array in ascending order. Only Good for use in Indexed Array

//Example 1
$persons = ['Jon', "Smith", "Adam", "Mhen"];

sort($persons);
print_r($persons);

/*------------------------------------------------------------*/

//rsort(): Sorts an array in descending order.

//Example 1
$persons = ['Jon', "Smith", "Adam", "Mhen"];
rsort($persons);
print_r($persons);

/*------------------------------------------------------------*/

//asort(): Sorts an associative array in ascending order, maintaining key-value associations.
//Tip: Use the arsort() function to sort an associative array in descending order, according to the value.

//Example 1
$person_info = [
        'name' => "John Doe",
    'email' => 'example@example.com',
    'phone' => '0152585858'
];
asort($person_info);
print_r($person_info);

/*------------------------------------------------------------*/

//arsort(): Sorts an associative array in descending order, maintaining key-value associations.
$person_info = [
    'name' => "John Doe",
    'email' => 'example@example.com',
    'phone' => '0152585858'
];
arsort($person_info);
print_r($person_info);

/*------------------------------------------------------------*/

//ksort(): Sorts an associative array by keys in ascending order.
//krsort(): Sorts an associative array by keys in descending order.
//usort(): Sorts an array using a user-defined comparison function.
//uasort(): Sorts an associative array using a user-defined comparison function, maintaining key-value associations.
//uksort(): Sorts an associative array by keys using a user-defined comparison function.
//For searching in arrays, you can use functions like:
//
//in_array(): Checks if a value exists in an array.
//array_search(): Searches for a value in an array and returns the corresponding key if found.
//array_key_exists(): Checks if a key exists in an array.
//array_filter(): Filters elements of an array using a callback function.
//array_walk(): Apply a user-defined function to each element of an array.
