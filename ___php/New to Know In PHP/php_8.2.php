<?php

// 🚀 PHP 8.2 (Released: December 8, 2022)

// Key Features:

// 1) Readonly Classes
//    * Entire classes can be marked as readonly, meaning all of their properties are automatically readonly.
readonly class User {
    public function __construct(public string $name) {}
}

$user = new User("John");
echo $user->name;  // Outputs: John

// Uncommenting the next line would result in an error, because the class is readonly:
// $user->name = "Jane";  // Error: Cannot modify readonly property

// Properties in a readonly class are automatically readonly without explicitly declaring them as `readonly`.

// 2) Disjunctive Normal Form Types (DNF)
//    * PHP 8.2 introduces the support for disjunctive normal form types, where you can combine union types into more complex types.
function processData(int|string|null $data): void {
    if (is_int($data)) {
        echo "Integer: $data";
    } elseif (is_string($data)) {
        echo "String: $data";
    } else {
        echo "Null value received.";
    }
}

processData("Test");  // Outputs: String: Test



// 3) Deprecate Dynamic Variables in Constants
//    * PHP 8.2 deprecates dynamic variables in constants (e.g., using `const` with dynamic variables or expressions).
define('MY_CONSTANT', 'value');
echo MY_CONSTANT;  // Outputs: value

// However, using dynamic variables or expressions inside `const` is now deprecated in PHP 8.2.

// 4) Fetching Array Keys with `array_is_list()`
//    * PHP 8.2 introduces the `array_is_list()` function, which checks if an array is a list (indexed array).
$array = [1, 2, 3];
if (array_is_list($array)) {
    echo "Array is a list";  // Outputs: Array is a list
} else {
    echo "Array is not a list";
}


// 5) Performance Improvements
//    * PHP 8.2 comes with various internal performance improvements that increase speed and efficiency.

echo 'PHP 8.2 introduces performance improvements in the engine and internal optimizations.';

?>
