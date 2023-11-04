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


/*-----------*/

/*Anonymous Function*/

//Example 1

$multiply = function ($num)
{
    return $num * 2;
};

echo $multiply(7). PHP_EOL; // have to use $multiply() to call this function



//Example 2

$multiply = function ($num)
{
    return $num * 2;
};

/*Allow assign the function again*/
$multiply = function ($num)
{
    return $num * 3;
};

echo $multiply(7). PHP_EOL; // have to use $multiply() to call this function



//Example 3  /*Anonymous with callback function*/

$multiplyer = 2;

$multiply = function ($num) use($multiplyer) {
//    $multiplyer = 5; // this will work
  return $num * $multiplyer;
};

function sum($a, $b, $callback) // callback function will be executed after the a + b return;
{
    return $callback($a + $b); // Here after sum $a + $b, $callback function will call in this case multiply($num)
}

echo sum(5, 5, $multiply). PHP_EOL; // Output: 20





/*-----------*/


/*Shorter way to write anonymous function we called it Arrow Function*/

//Example:
$multiply = fn($num) => $multiplyer * $num;

// Above code is equivalent to the below code

$multiply = function ($num) use($multiplyer) {
//    $multiplyer = 5; // this will work
    return $num * $multiplyer;
};


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
function countTo5()
{
    yield from [1, 2, 3, 4];
    yield 5;
    yield 6;
}
echo PHP_EOL. PHP_EOL;
foreach (countTo5() as $value) {
    echo $value . PHP_EOL;
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





