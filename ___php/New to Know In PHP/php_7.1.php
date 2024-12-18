<?php

//🚀 PHP 7.1 (Released: December 1, 2016)
//Key Features:
//1) Nullable Types
    //* Use ? to allow null for scalar type declarations.

function setAge(?int $age) {
    return $age;
}

echo setAge(null); // Outputs: nothing


//2) Void Return Type
    //* Functions that do not return anything.

function sayHello(): void {
    echo "Hello World!";
}

sayHello();


//3) Iterable Type
    //* Accepts arrays and Traversable objects

function printIterable(iterable $items): void
{
    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }
}

printIterable([1, 2, 3]);



//4) Multi-Catch Exception Handling
    //* Handle multiple exception types in one catch.

try {
    throw new Exception("Error occurred");
} catch (RuntimeException | Exception $e) {
    echo $e->getMessage();
}



