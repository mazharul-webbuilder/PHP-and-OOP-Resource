<?php

// 🚀 PHP 8.3 (Released: November 2023)

// Key Features:

// 1) Typed Class Constants
//    * Class constants can now have types.
class User {
    public const string ROLE = 'Admin';
    public const int MAX_LOGIN_ATTEMPTS = 5;
}

echo User::ROLE;  // Outputs: Admin
echo User::MAX_LOGIN_ATTEMPTS;  // Outputs: 5


// 2) json_validate
//    * PHP 8.3 introduces the `json_validate()` function that checks if a string is valid JSON without decoding it.
$json = '{"name": "John", "age": 30}';

if (json_validate($json)) {
    echo "Valid JSON";  // Outputs: Valid JSON
} else {
    echo "Invalid JSON";
}

// Example with invalid JSON:
$invalidJson = '{"name": "John", "age": 30';
if (!json_validate($invalidJson)) {
    echo "Invalid JSON";  // Outputs: Invalid JSON
}


// 3) Disallowing `#` in Hexadecimal Floats
//    * PHP 8.3 disallows the use of `#` in hexadecimal float literals (e.g., `0x1.2p3` is now invalid).
//    * This is to standardize floating-point representation in hexadecimal format.

// The correct way is to use standard decimal or scientific notation.
// Example:
$float = 1.2e3;


// 4) Sensitive Parameter Redaction in Backtraces
//    * PHP 8.3 allows marking sensitive parameters to redact their values in error backtraces.
function handleSensitiveData(#[\SensitiveParameter] string $password) {
    throw new Exception("Error with sensitive data");
}

try {
    handleSensitiveData("supersecret");
} catch (Exception $e) {
    var_dump($e->getTrace());
}
// The value of $password will be redacted in the backtrace.


// 5) Disjunctive Normal Form (DNF) Types
//    * Allows using `A|B&C` type declarations, which is equivalent to `(A|B)&C`.
function processInput((string|int)&Serializable $input): void {
    // Logic here
}


// 6) New Functions for Arrays
//    * PHP 8.3 introduces new functions for common array operations.

// array_is_list(): Checks if an array is a list (sequential integer keys starting from 0).
$list = ["a", "b", "c"];
$assoc = ["a" => 1, "b" => 2];

var_dump(array_is_list($list));  // Outputs: bool(true)
var_dump(array_is_list($assoc)); // Outputs: bool(false)


// 7) Performance Improvements
//    * PHP 8.3 includes various performance improvements, such as optimizations for internal functions and memory handling.
echo 'PHP 8.3 brings performance improvements and optimizations.';

?>
