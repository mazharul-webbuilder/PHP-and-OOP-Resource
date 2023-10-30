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

//Example 1

$person_info = [
    'name' => "John Doe",
    'email' => 'example@example.com',
    'phone' => '0152585858'
];
ksort($person_info);
print_r($person_info);


/*------------------------------------------------------------*/

//krsort(): Sorts an associative array by keys in descending order.

//Example 1

$person_info = [
    'name' => "John Doe",
    'email' => 'example@example.com',
    'phone' => '0152585858'
];
krsort($person_info);
print_r($person_info);

/*------------------------------------------------------------*/

/**
 * usort(): Sorts an array using a user-defined comparison function.
 *The usort() function sorts an array by values using a user-defined comparison function.
*/

//Example 1

$array = [4, 2, 8, 6];

usort($array, function ($a, $b){
    if ($a == $b) return 0;
    return ($a < $b) ? -1 : 1;
});

print_r($array); // output: 2, 4, 6, 8


/*------------------------------------------------------------*/

//uasort(): Sorts an associative array using a user-defined comparison function, maintaining key-value associations.

//Example 1
$ass_array = [
        "a" => 4,
    "b" => 2,
    "c" => 8,
    "d" => 6
];

uasort($ass_array, function ($a, $b){
    if ($a == $b) return 0;
    return ($a < $b) ? -1 : 1;
});

print_r($ass_array); //Output [b] => 2 [a] => 4 [d] => 6 [c] => 8

/*------------------------------------------------------------*/

//uksort(): Sorts an associative array by keys using a user-defined comparison function.

//Example 1
$ass_array = [
    "a" => 4,
    "b" => 2,
    "c" => 8,
    "d" => 6
];

uksort($ass_array, function ($a, $b){
    if ($a == $b) return 0;
    return ($a < $b) ? -1 : 1;
});

print_r($ass_array); //Output [a] => 4 [b] => 2 [c] => 6 [d] => 8

/*------------------------------------------------------------*/
//For searching in arrays, we can use functions like:
/*------------------------------------------------------------*/


/*------------------------------------------------------------*/
//in_array(): Checks if a value exists in an array. case sensetive

//Example 1

$persons = array("Maz", "Ras", "Afr");
if (in_array("Maz", $persons)) echo "Found In Array". PHP_EOL;
else echo "Not Found In Array" . PHP_EOL;

/*------------------------------------------------------------*/

//array_search(): Searches for a value in an array and returns the corresponding key if found. work in both indexed and associate array

//Example 1

$persons = array("Maz", "Ras", "Afr", "Lmm");

echo array_search('Lmm', $persons) . PHP_EOL; // Output: 3


/*------------------------------------------------------------*/



/*------------------------------------------------------------*/

//array_key_exists(): Checks if a key exists in an array.

//Example 1
$ass_array = [
    "a" => 4,
    "b" => 2,
    "c" => 8,
    "d" => 6
];
if (array_key_exists('c', $ass_array)) {
    echo "Array Key Exists" . PHP_EOL;
} else {
    echo "Array Key Not Exists" . PHP_EOL;
}


/*------------------------------------------------------------*/

//array_filter(): Filters elements of an array using a callback function.

//Example 1

$numbers = array(1, 3, 2, 3, 4);

$filtered_odd = array_filter($numbers, function ($number){
    return ($number & 1);
});

print_r($filtered_odd); // Output: 1, 3, 3

/*------------------------------------------------------------*/

//array_walk(): Apply a user-defined function to each element of an array.

//Example 1
$ass_array = [
    "a" => 'red',
    "b" => 'green',
    "c" => 'blue',
];

array_walk($ass_array, function ($value, $key){
    echo "The key $key has the value $value" . PHP_EOL;
});

/*------------------------------------------------------------*/


