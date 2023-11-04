<?php
/**
 * New features of php that should know and use in PHP
*/
//----------------------------------------------------//

//match keyword work as switch work, but little different

//Example: 1

$paymentStatus = 1;

$messasge = match ($paymentStatus){
    1 => 'Success',
    2 => 'Denied',
    default => 'Unknown' // if datatype not mathc
};

var_dump($messasge); // output: success


//----------------------------------------------------//

// Variadic Functions

function sum(int|float ...$nums): int|float // will accept n number of parameters
{
    //$nums variable will contain as array

    return array_sum($nums);
}

echo sum(1, 3,4,5) . PHP_EOL;


//----------------------------------------------------//

// Named Argument

function add($a, $b): int|float
{
    return $a + $b;
}

echo add(a: 10, b: 5) . PHP_EOL; // Here used named argument


//----------------------------------------------------//

/*Predefined PHP_Constant Variable*/
//like PHP_VERSION, PHP_EOL, PHP_INT_MAX, PHP_INT_MAX ........................


//----------------------------------------------------//

/*Alternative Syntax To creating Constant*/

define('FOO', 'Hello World');

if (defined(FOO)){
    echo true;
}

echo FOO . PHP_EOL;


//----------------------------------------------------//

//Magic Constants, PHP offer  9 magic constants

/*__LINE__  this will the return the current line number*/

echo __LINE__ . PHP_EOL; // Output: 25
echo __FILE__ . PHP_EOL; // Output: C:\xampp\htdocs\oop\practices\new to know\new_kno_cheat_sheet.php
echo __DIR__ . PHP_EOL; // Output: C:\xampp\htdocs\oop\practices\new to know
echo __FUNCTION__ . PHP_EOL; // It returns the name of the current function
echo __CLASS__ . PHP_EOL; // It returns the name of the current class
echo __TRAIT__ . PHP_EOL; // It returns the name of the current trait
echo __METHOD__ . PHP_EOL; // It returns the name of the current method (function in a class).
echo __NAMESPACE__ . PHP_EOL; // This constant returns the current namespace.
//echo __COMPILER_HALT_OFFSET__ . PHP_EOL; // It is used in conjunction with the __halt_compiler() directive to determine the offset for the __HALT_COMPILER() marker within the script.

//----------------------------------------------------//


/**
 * Value Passed by Reference or Pass by Value in a function parameter
*/
//Rule 1: if $x = 0, if $x passed in a fun param it call pass by value, if inside function value of $x change main $x will be not change
//Rule 2: if $x = 0, if $x passed in a fun param it call pass by reference, if inside function value of $x change main $x will  change


//Example 1: Passed by value

$cup = 'empty';
function fillCup($cupParam)
{
    $cupParam = 'filled';
}
echo fillCup($cup) . PHP_EOL;

echo $cup . PHP_EOL;


//Example 1: Passed by references

$cup2 = 'empty';
function fillCup2(&$cupParam)
{
    $cupParam = 'filled';
}
echo fillCup2($cup) . PHP_EOL;

echo $cup . PHP_EOL;



//----------------------------------------------------//
