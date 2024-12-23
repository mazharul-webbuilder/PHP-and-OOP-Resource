<?php

// 🚀 PHP 7.4 (Released: November 28, 2019)

// Key Features:

// 1) Typed Properties 2.0
//    * PHP 7.4 introduces the ability to declare types for class properties.
class User
{
    public string $name;
    public int $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

$user = new User("Alice", 30);
echo $user->name;  // Outputs: Alice
echo $user->age;   // Outputs: 30



// 2) Arrow Functions (Short Closures)
//    * Shortened syntax for anonymous functions (closures).
$sum = fn($a, $b) => $a + $b;

echo $sum(3, 4);  // Outputs: 7



// 3) Preloading
//    * PHP 7.4 introduces support for preloading files for better performance in PHP-FPM.
if (function_exists('opcache_compile_file')) {
    opcache_compile_file('/path/to/file.php');
}


// 4) Null Coalescing Assignment Operator (`??=`)
//    * Introduces a shorthand for assigning values only if the variable is `null`.
$data = null;
$data ??= 'default_value';

echo $data;  // Outputs: default_value



// 5) Weak References
//    * PHP 7.4 introduces `WeakReference` which allows creating references to objects that do not prevent them from being garbage collected.
$obj = new stdClass();
$ref = WeakReference::create($obj);

echo $ref->get() === $obj ? "Object is still referenced" : "Object is garbage collected";  // Outputs: Object is still referenced



// 6) Spread Operator in Array Expressions
//    * PHP 7.4 allows using the spread operator (`...`) in array expressions.
$array1 = [1, 2, 3];
$array2 = [4, 5, 6];
$array3 = [...$array1, ...$array2];

print_r($array3);  // Outputs: Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 [5] => 6 )



// 7) Numeric Literal Separators
//    * PHP 7.4 introduces support for numeric separators (`_`) to make large numbers more readable.
$bigNumber = 1_000_000;
echo $bigNumber;  // Outputs: 1000000



// 8) `covariant` Return Types
//    * PHP 7.4 allows more flexible return types in child classes (covariant return types).
class Animal
{
    public function makeSound(): string
    {
        return "Some sound";
    }
}

class Dog extends Animal
{
    public function makeSound(): string  // Covariant return type
    {
        return "Bark";
    }
}

$dog = new Dog();
echo $dog->makeSound();  // Outputs: Bark



// 9) `covariant` Parameter Types (PHP 7.4 now allows child classes to declare more specific types for parameters)
class Base
{
    public function foo(Animal $animal): void
    {
        echo get_class($animal);
    }
}

class Sub extends Base
{
    public function foo(Dog $dog): void  // Covariant parameter type
    {
        echo get_class($dog);
    }
}

$sub = new Sub();
$sub->foo(new Dog());  // Outputs: Dog



// 10) `self` and `parent` in Type Declarations
//    * You can now use `self` and `parent` as valid type hints in class methods.
class Example
{
    public function factory(): self
    {
        return new self(); // Creates an instance of Example
    }

    public function parentFactory(): parent
    {
        return new parent(); //❌ This will result in a fatal error. In PHP, parent is not a valid way to instantiate an object
    }
}
//NOTE: Correct use of use parent
//Here’s how parent is typically used in PHP:
//
//Example 1: Calling a Parent Method
class ParentClass
{
    public function greet()
    {
        return "Hello from ParentClass";
    }
}

class ChildClass extends ParentClass
{
    public function greet(): string
    {
        return parent::greet() . " and ChildClass";
    }
}

$child = new ChildClass();
echo $child->greet();  // Outputs: Hello from ParentClass and ChildClass

//Example 2: Calling a Parent Constructor
class ParentClass
{
    protected string $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }
}

class ChildClass extends ParentClass
{
    public function __construct()
    {
        parent::__construct("Message from Parent");
    }

    public function getMessage()
    {
        return $this->message;
    }
}

$child = new ChildClass();
echo $child->getMessage();  // Outputs: Message from Parent



// 11) `filter_var()` Returns False on Failure
//    * The `filter_var()` function now returns `false` when validation fails instead of `0` or `null`.
$email = "invalid-email.com";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";  // Outputs: Invalid email format
}



// 12) Deprecation of `real` Type Hint
//    * PHP 7.4 deprecates the use of the `real` type hint.
echo 'The real type hint is deprecated in PHP 7.4. Use float instead.';


// 13) `fdiv()` Function
//    * PHP 7.4 introduces a `fdiv()` function to handle floating-point division more consistently.
echo fdiv(10, 2);  // Outputs: 5

// 14) Unpacking Inside Class Definitions
//    * You can now use the spread operator to unpack arrays inside class definitions.
class MyClass
{
    public $values;

    public function __construct(...$values)
    {
        $this->values = $values;
    }
}

$obj = new MyClass(1, 2, 3);
print_r($obj->values);  // Outputs: Array ( [0] => 1 [1] => 2 [2] => 3 )


?>
