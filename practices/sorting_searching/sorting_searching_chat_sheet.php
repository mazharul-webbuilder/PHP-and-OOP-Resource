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
//arsort(): Sorts an associative array in descending order, maintaining key-value associations.
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
//Please note that PHP's features and functions may evolve with each new release. You should check the official PHP documentation for the version you're using to get the most up-to-date information on PHP functions for sorting and searching. You can visit the PHP documentation here: PHP Documentation.
//
//
//
//
//User
//give me list of all latest php version function for control sorting and searching
//
//ChatGPT
//As of my last knowledge update in January 2022, I can provide you with a list of common PHP functions for sorting and searching in arrays. However, please note that PHP may have had new releases and updates since then, so I recommend checking the official PHP documentation for the most up-to-date information on functions and their usage.
//
//For sorting arrays, you can use functions like:
//
//sort(): Sorts an array in ascending order.
//rsort(): Sorts an array in descending order.
//asort(): Sorts an associative array in ascending order, maintaining key-value associations.
//arsort(): Sorts an associative array in descending order, maintaining key-value associations.
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