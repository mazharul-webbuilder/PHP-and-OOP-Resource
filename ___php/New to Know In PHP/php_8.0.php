<?php

// 🚀 PHP 8.0 (Released: November 26, 2020)

// Key Features:

// 1) Union Types
//    * Accept multiple types for arguments.
use JetBrains\PhpStorm\Deprecated;

function printValue(int|float $value): void
{
    echo $value;
}

printValue(10.5); // Works!



// 2) Named Arguments
//    * Pass arguments by name.
function displayInfo($name, $age): void
{
    echo "$name is $age years old";
}

displayInfo(name: "John", age: 30);



// 3) Match Expression
//    * Replacement for switch.
$status = 200;

echo match($status) {
    200 => 'OK',
    404 => 'Not Found',
    default => 'Unknown',
};



// 4) Attributes
//    * Add metadata to classes or methods.
#[Deprecated]
function oldFunction(): void
{
    echo "This function is deprecated.";
}



// 5) Constructor Property Promotion
//    * Shorter syntax for properties.
class User {
    public function __construct(public string $name, private int $age) {}
}

$user = new User("John", 30);



// 6) Nullsafe Operator
//    * Nullsafe operator `?->` allows chaining methods or accessing properties of potentially null objects.
class UserProfile {
    public function getName(): string {
        return "John Doe";
    }
}

$userProfile = null;
echo $userProfile?->getName(); // Outputs nothing because $userProfile is null

$userProfile = new UserProfile();
echo $userProfile?->getName(); // Outputs: John Doe



// 7) JIT (Just-in-Time) Compilation
//    * JIT is a new feature that improves performance by compiling parts of the code at runtime.
//    * JIT is primarily for performance optimization, not directly usable via code but improves PHP performance.
echo "JIT improves PHP performance, but it's handled internally, not by code directly.";



// 8) Saner String to Number Comparisons
//    * PHP 8.0 changes how strings and numbers are compared to avoid unexpected behavior.
var_dump("10" == 10);  // Outputs: bool(true)
var_dump("10" === 10); // Outputs: bool(false)  // No implicit type conversion for `===`



// 9) Consistent Type Errors for Internal Functions
//    * PHP 8.0 improves type handling by throwing `TypeError` in many internal functions.
function addNumbers(int $a, int $b): int {
    return $a + $b;
}

try {
    echo addNumbers(5, "5"); // Will throw a TypeError due to incorrect type
} catch (TypeError $e) {
    echo "Error: " . $e->getMessage();  // Outputs: Error: Argument 2 passed to addNumbers() must be of the type int, string given
}



// 10) Throwing Expressions
//    * PHP 8.0 allows throwing exceptions as part of expressions.
function checkPositive(int $num): void {
    $num <= 0 ? throw new InvalidArgumentException("Number must be positive.") : null;
}

try {
    checkPositive(-1); // Will throw an exception
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();  // Outputs: Number must be positive.
}



// 11) Weak Maps
//    * Weak references to objects in a map, allowing garbage collection without breaking references.
$obj1 = new stdClass();
$obj2 = new stdClass();

$map = new WeakMap();
$map[$obj1] = 'first';
$map[$obj2] = 'second';

echo $map[$obj1]; // Outputs: first
unset($obj1); // Unsets the reference

// After unsetting, the object is eligible for garbage collection.
echo isset($map[$obj1]) ? $map[$obj1] : 'Not found'; // Outputs: Not found



// 12) `str_contains()`, `str_starts_with()`, `str_ends_with()`
//    * New functions for working with strings to check containment, start, or end without regular expressions.
echo str_contains("hello world", "world") ? 'Contains' : 'Does not contain'; // Outputs: Contains
echo str_starts_with("hello world", "hello") ? 'Starts with hello' : 'Does not start with hello'; // Outputs: Starts with hello
echo str_ends_with("hello world", "world") ? 'Ends with world' : 'Does not end with world'; // Outputs: Ends with world



// 13) `array_is_list()`
//    * New function to check if an array is a list (indexed array).
$array = [1, 2, 3];
echo array_is_list($array) ? 'Array is a list' : 'Array is not a list'; // Outputs: Array is a list



// 14) Performance Improvements
//    * PHP 8.0 comes with various performance improvements, including optimizations to the engine and functions.
echo 'PHP 8.0 provides significant performance improvements thanks to JIT and other engine optimizations.';

?>
