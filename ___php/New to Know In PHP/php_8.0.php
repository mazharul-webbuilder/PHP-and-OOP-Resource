<?php

//🚀 PHP 8.0 (Released: November 26, 2020)

//Key Features:

//1) Union Types
    //* Accept multiple types for arguments.
function printValue(int|float $value) {
    echo $value;
}

printValue(10.5); // Works!


//2) Named Arguments
    //* Pass arguments by name.
function displayInfo($name, $age) {
    echo "$name is $age years old";
}

displayInfo(age: 30, name: "John");


//3) Match Expression
    //* Replacement for switch.

$status = 200;

echo match($status) {
    200 => 'OK',
    404 => 'Not Found',
    default => 'Unknown',
};


//4) Attributes
    //* Add metadata to classes or methods.

#[Deprecated]
function oldFunction() {
    echo "This function is deprecated.";
}


//5) Constructor Property Promotion
    //* Shorter syntax for properties.

class User {
    public function __construct(public string $name, private int $age) {}
}

$user = new User("John", 30);
