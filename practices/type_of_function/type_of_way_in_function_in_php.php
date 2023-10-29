<?php

/**
 * In PHP, functions can define in several ways.
 * Here are the primary methods for defining functions in PHP.
*/
/*------------------------------------------------------------*/
//Standard Function:
function add($a, $b)
{
    return $a + $b;
}
/*------------------------------------------------------------*/
//Arrow Functions & Anonymous Functions (Closures):
$y = 1;

$fn1 = fn($x) => $x + $y;

// equivalent to using $y by value:
$fn2 = function ($x) use ($y) {
    return $x + $y;
};

var_export($fn1(3));
/*------------------------------------------------------------*/

//Dynamic Function Names (Variable Functions):
//You can use variable functions to call a function using a variable for the function name.

$functionName = "add";
$result = $functionName(2, 3); // Calls the "add" function
/*------------------------------------------------------------*/
function getNumbers() {
    for ($i = 1; $i <= 5; $i++) {
        yield $i;
    }
}

foreach (getNumbers() as $number) {
    echo $number . PHP_EOL;
}
/*------------------------------------------------------------*/
//Magic Methods (For Classes):
//In object-oriented PHP, you can define magic methods like __construct, __toString, and __get within classes.

class MyClass {
    public function __construct() {
    }
/*------------------------------------------------------------*/
    public function __toString() {
    return "This is a MyClass instance.";
    }
}
/*------------------------------------------------------------*/





