<?php
/**
 * PHP supports several data types, which can be categorized into the following main groups:
*/
/*--------------------------------------------------------------------------------------*/

//Scalar Types:

$number = 50;

//int: Represents integers (whole numbers).

/*--------*/

$float_or_double = 50.0125;

//float (or double): Represents floating-point numbers (numbers with decimal points).

/*--------*/

$string = "I am String";

//string: Represents sequences of characters.

/*--------*/

$bool = true;

//bool: Represents boolean values (true or false).

/*--------------------------------------------------------------------------------------*/

//Compound Types:

//array: Represents an ordered, associative array of values.

$indexed_array =  [1, 2, 'hello', 20.25, true, null];

$associative_array = [
        'name' => 'John',
    'email' => 'john@example.com',
    'phone' => '01252525252',
    'status' => true,
];

$multi_dimentional_array_persons = [
        'p1' =>  [
            "name" => 'John',
            'email' => 'john@demo.com',
            'status' => true
        ],'p2' =>  [
            "name" => 'Adam',
            'email' => 'adam@demo.com',
            'status' => false
        ],
];

/*--------*/

//object: Represents instances of classes.

class Hello {

}

$object = new Hello();

/*--------------------------------------------------------------------------------------*/

//callable: Represents a callback to a function or method.

// Define a class with a method

// Define a function that takes a callable as a parameter
function executeCallback(callable $callback) {
    // Call the provided callback
    $result = $callback();
    echo "Result: $result\n";
}

// Define a simple function
function add($a, $b) {
    return $a + $b;
}

class Math {
    public function multiply($a, $b) {
        return $a * $b;
    }
}

// Usage of the executeCallback function with different callbacks
executeCallback('add'); // Using a function name as a string
executeCallback([new Math(), 'multiply']); // Using an instance and method name
executeCallback(fn () => 10 * 5); // Using an anonymous function

// You can also store a callback in a variable
$callback = 'add';
executeCallback($callback);


/*--------------------------------------------------------------------------------------*/

//iterable: Represents any data structure that can be iterated (e.g., arrays and objects implementing the Iterator interface).
//Special Types:
//
//null: Represents the absence of a value or a variable with no value assigned.
//resource: Represents external resources (e.g., database connections) and is typically managed internally by PHP extensions.
//Pseudo-Types:
//
//mixed: Represents a value that can have different data types.
//void: Represents a function that does not return a value.
//never: Represents a function that never returns (introduced in PHP 8.0).
