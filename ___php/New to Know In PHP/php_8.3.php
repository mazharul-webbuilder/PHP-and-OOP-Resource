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



// 3) Disallowing `#` in hexadecimal floats
//    * PHP 8.3 disallows the use of `#` in hexadecimal float literals (e.g., `0x1.2p3` is now invalid).
//    * This is to standardize floating point representation in hexadecimal format.
$float = 0x1.2p3;  // Error: Invalid float literal

// The correct way is to use standard decimal or scientific notation.
// $float = 1.2e3;



// 4) Performance Improvements
//    * PHP 8.3 includes various performance improvements, such as optimizations for internal functions and memory handling.

echo 'PHP 8.3 brings performance improvements and optimizations.';

?>
