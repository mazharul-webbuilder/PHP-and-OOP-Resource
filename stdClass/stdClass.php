<?php

/**
 *
* In PHP, stdClass is a built-in generic class that is part of the standard class (hence the name stdClass).
 * It is an empty class and does not have any predefined properties or methods.
 * stdClass is often used as a way to create objects on the fly,
 * especially when you want to create an object without defining a specific class for it.
*/

//Example 1

// Creating a new stdClass object
$person = new stdClass();

// Adding properties to the object
$person->name = "John Doe";
$person->age = 30;
$person->city = "Example City";

// Accessing properties of the object
echo "Name: " . $person->name . PHP_EOL;
echo "Age: " . $person->age . PHP_EOL;
echo "City: " . $person->city . PHP_EOL;

// Modifying a property
$person->age = 31;

// Displaying the updated age
echo "Updated Age: " . $person->age . PHP_EOL; // Output 31

// Using stdClass for dynamic properties
$dynamicObject = new stdClass();
$dynamicObject->property1 = "Value 1";
$dynamicObject->property2 = "Value 2";

echo "Dynamic Property 1: " . $dynamicObject->property1 . PHP_EOL;
echo "Dynamic Property 2: " . $dynamicObject->property2 . PHP_EOL;

/*==============================================================*/

//Example: 2

// JSON data as a string
$jsonData = '{"name": "Alice", "age": 25, "city": "Wonderland"}';

// Decode JSON string into stdClass object
$person = json_decode($jsonData);

// Accessing properties of the object
echo "Name: " . $person->name . "<br>";
echo "Age: " . $person->age . "<br>";
echo "City: " . $person->city . "<br>";

// Modifying a property
$person->age = 26;

// Displaying the updated age
echo "Updated Age: " . $person->age . "<br>";

// Creating a new property
$person->occupation = "Developer";

// Displaying the new property
echo "Occupation: " . $person->occupation . "<br>";

// Encoding stdClass object back to JSON
$newJsonData = json_encode($person);

echo "New JSON Data: " . $newJsonData . "<br>";

/*===========================================*/

