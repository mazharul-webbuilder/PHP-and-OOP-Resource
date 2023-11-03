<?php
/**
 * PHP has a good deal of build in functions
 */

/*--------------------------------------------------------------------------------------*/

//All build in function available in php 8.2 found in below official link
//https://www.php.net/manual/en/indexes.functions.php

/*--------------------------------------------------------------------------------------*/

//Display value with data type
var_dump(2); // output: int(2)

/*--------------------------------------------------------------------------------------*/

//unset() // this function is used to released memory that a variable hold for unnecessary or to delete variable

//Example  1

$name = "John";

echo $name . PHP_EOL;

unset($name); // After using a variable we can unset it, because this will hold memory till end of script


//Example 2

$names = ['John', 'Jane', "Bob"];

unset($names[1]); // will delete item jane

$names = array_values($names); // Will reindex the rest of the array

/*--------------------------------------------------------------------------------------*/

/*sleep() function, used for delay*/

//Example: 1
if (true) {
    sleep(2); // will wait 2 sec before executing next line

    echo "hello, I wake" . PHP_EOL;
}
/*--------------------------------------------------------------------------------------*/

/*isset() check is the variable has value*/

$users  = ['John', 'Jane', 'Bob'];

if (isset($users[0])) {
    return true;
}

/*--------------------------------------------------------------------------------------*/



/*--------------------------------------------------------------------------------------*/

/*range() generate value like A - Z as array format*/

$letters = range('A', 'Z');


/*--------------------------------------------------------------------------------------*/


