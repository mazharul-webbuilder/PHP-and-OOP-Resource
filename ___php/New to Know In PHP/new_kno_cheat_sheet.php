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

/*Readonly Property*/

//In PHP 8.1
/**
 * // Note: If you declare a property readonly
 * you must have to add property type like string, int , boll or whatever
 * Otherwise it will trigger error
*/
class MyReadOnlyClass8_1
{
    public readonly string $name;
    public readonly int $age;
}

//--------------


/**
 * In php 8.2 we can write as below
 * if we declare class as readonly properties should not have to
 * add extra readonly keyword
 *
 * Note: Data type must have to add
*/
readonly class MyReadOnlyClass8_2
{
    public string $name;
    public int $age;
}

//----------------------------------------------------//

/**
 * Anonymous Class
 *
 * An anonymous class in PHP is a class without a name.
 * Instead of defining a class with the class keyword and providing a name, you create an instance of a class on the fly,
 * usually for a specific, one-time use.
 * Anonymous classes are defined using the new class syntax.
*/

//Example 1

$object = new class {
  public string $variable;
  public function demoMethod(): string
  {
      return "hello";
  }
};
$value = $object->demoMethod();

//Example 2
interface InterfaceForAnonymousClass{
    public function mustImplement();
}

$anonymousObject = new class implements InterfaceForAnonymousClass{
    public function mustImplement()
    {
        // TODO: Implement mustImplement() method.
    }
};

//Example 3
function createObject(): object
{
    return new class{

    };
}

$object = createObject();

//----------------------------------------------------//
// in php 8.3
//Typed class constants
//You can now typehint class constants:

class Foo
{
    const string BAR = 'baz';
}
//----------------------------------------------------//

// Dynamic Class constant fetch

class DynamicConstantClass
{
    const PHP = "8.3";
}

$searchableConstant = 'PHP';

$result = DynamicConstantClass::{$searchableConstant};

var_dump($result);


//-------------------------------------------------------//

// Deep Cloning of readonly properties

class PHP
{
    public string $version = '8.3';
}
readonly class ReadOnlyClass
{
    public function __construct(public PHP $php){}
    public function __clone(): void
    {
        $this->php = clone $this->php;
    }
}

$instance = new ReadOnlyClass(new PHP());

$cloned = clone $instance;

$temp = $cloned->php->version;

//----------------------------------------------------//
/**
* #[Override] keyword
* This Override feature intruduce in PHP 8.3, 
* If parent class change a method name that is override by child class, child class doesn't have know the parent method name changed,
* With the #[Override] keyword, php will through an error
*/
abstract class Parent
{
    public function methodWithDefaultImplementation(): int
    {
        return 1;
    }
}

final class Child extends Parent
{
    #[Override]
    public function methodWithDefaultImplementation(): int
    {
        return 2; // The overridden method
    }
}
//----------------------------------------------------//




