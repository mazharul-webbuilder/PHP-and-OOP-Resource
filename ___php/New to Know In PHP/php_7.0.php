<?php

//🚀 PHP 7.0 (Released: December 3, 2015)
    //Key Features:
        //1)Scalar Type Declarations
            //*Allows you to enforce type hints for function arguments: int, float, string, bool

declare(strict_types=1);

function addNumbers(int $a, int $b): int {
return $a + $b;
}

echo addNumbers(5, 10); // Outputs: 15
echo addNumbers(5, '10'); // Error in strict mode

//2) Return Type Declarations
    //* Specify the return type of a function.

function getSum(float $a, float $b): float {
    return $a + $b;
}

echo getSum(2.5, 3.1); // Outputs: 5.6



//3) Null Coalescing Operator (??)
    //* Returns the first non-null value.

$name = $_GET['name'] ?? 'Guest';
echo $name; // Outputs: Guest if 'name' is not set


//4) Spaceship Operator (<=>)
    //* Three-way comparison: returns -1, 0, or 1.

echo 1 <=> 2; // Outputs: -1 (less than)
echo 2 <=> 2; // Outputs: 0 (equal)
echo 3 <=> 2; // Outputs: 1 (greater than)


//5) Anonymous Classes
    //* Inline class definition.

$object = new class {
    public function sayHello() : string
    {
        return "Hello from anonymous class!";
    }
};

echo $object->sayHello();


