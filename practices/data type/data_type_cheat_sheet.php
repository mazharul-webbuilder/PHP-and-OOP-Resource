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

/*--------*/

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


/*--------*/

//iterable: Represents any data structure that can be iterated (e.g., arrays and objects implementing the Iterator interface).
function processIterable(iterable $data): void
{
    foreach ($data as $item) {
        echo $item . " ";
    }
}

$array = [1, 2, 3];
processIterable($array); // You can pass an array

/*--------------------------------------------------------------------------------------*/

//Special Types:

//null: Represents the absence of a value or a variable with no value assigned.

$i_have_no_value = null;

if (is_null($i_have_no_value)){
    echo "No Value  found" . PHP_EOL;
} else {
    echo "Contain Value" . PHP_EOL;
}

/*--------------------------------------------------------------------------------------*/


//resource: Represents external resources (e.g., database connections) and is typically managed internally by PHP extensions.

/**
 * In PHP, a resource is a special data type that represents external resources, such as file handles, database connections, sockets, or other system-level resources. These resources are typically managed internally by PHP extensions and are used to interact with external services or entities that are not part of the standard PHP language.
*A few key points to understand about resource in PHP:
*Internal Management: Resources are managed by PHP extensions, which are written in C or other low-level languages. The resource type is essentially a handle or reference to the underlying external resource, and PHP extensions take care of creating, manipulating, and releasing these resources.
*Examples of Resources: Some common examples of resources include file handles (created with functions like fopen()), database connections (such as those created with mysqli_connect() or PDO), image resources (e.g., created with the GD library for image processing), and network sockets.
*Resource Functions: To work with resources, PHP provides specific functions to perform operations on them. For example, you can use functions like fclose() to close a file handle, mysqli_close() to close a database connection, and various GD library functions to manipulate image resources.
*/
// Open a file for reading
$fileHandle = fopen("example.txt", "r");

if ($fileHandle === false) {
    die("Failed to open the file.");
}

// Read and output the contents of the file
while (!feof($fileHandle)) {
    $line = fgets($fileHandle);
    echo $line;
}

// Close the file resource
fclose($fileHandle);

/*--------*/

//Pseudo-Types:

//Example 1
/**
 * static: The static pseudo-type is used to indicate that a method should return an instance of the calling class.
 * This is often used in object-oriented programming to achieve method chaining.
*/
class HelloClass {
    public static function create(): self  // here self is pseudo type
    {
        return new self();
    }
}

//Example 2

/**
 * parent: The parent pseudo-type is used to indicate that a method should return an instance of the parent class.
*/
class ParentClass {
    public static function create(): parent
    {
        return new parent();
    }
}

/*--------*/

//mixed: Represents a value that can have different data types.

/**
 * In PHP, the mixed type is not a built-in type, but it is often used in function and method signatures to indicate that a parameter or return value can have different data types.
 * It's essentially a way to express that a variable can accept values of various types without specifying a single, fixed type.
 * This is particularly useful when a function or method needs to be flexible and work with a wide range of data types.
*/
function processValue(mixed $value): void {
    // Function logic that can handle different data types
}

/*--------*/

//void: Represents a function that does not return a value.

function logMessage(string $message): void {
    // Log the message, but don't return a value
    // Typically, this function has side effects, such as writing to a log file
}

/*--------*/

//never: Represents a function that never returns (introduced in PHP 8.0).

/**
 * never is a new return type added in PHP 8.1.
 * A function/method that is declared with the never return type indicates that it will never return a value,
 * and always throws an exception or terminates with a die/exit call.
 * never return type is similar to the existing void return type,
 * but the never type guarantees that the program will terminate or throw. In other words,
 * a function/method declared never must not call return at all, not even in the return; form.
*/
function redirect(string $url): never {
    header('Location: ' . $url);
    exit();
}
/*-----------------------------------------------------------------------------------*/


