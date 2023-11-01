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


/*--------------------------------------------------------------------------------------*/

//object: Represents instances of classes.
//callable: Represents a callback to a function or method.
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
//It's important to note that PHP is a loosely typed language, meaning that you don't need to explicitly declare the data type of a variable. PHP will automatically determine the data type based on the context. However, you can explicitly specify data types for function parameters and return values in PHP 7.0 and later using type declarations.
//
//For example, in PHP 7.0 and later, you can declare a function like this:
//
//php
//Copy code
//function add(int $a, int $b): int {
//return $a + $b;
//}
//In this example, the function add expects two integer arguments and returns an integer. If you pass values of the wrong data type, PHP will attempt to convert them if possible or throw a type error.