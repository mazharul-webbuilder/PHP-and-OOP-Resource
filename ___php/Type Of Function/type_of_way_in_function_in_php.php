<?php

/**
 * PHP Functions Complete Guide
 *
 * This guide covers all types of functions in PHP and every possible way to use them.
 * Functions are fundamental building blocks in PHP programming.
 *
 * Types of Functions:
 * 1. User-defined functions
 * 2. Built-in functions
 * 3. Anonymous functions (Closures)
 * 4. Arrow functions
 * 5. Generator functions
 * 6. Recursive functions
 * 7. Variable functions
 * 8. Callback functions
 * 9. Higher-order functions
 * 10. Magic methods (class functions)
 * 11. Static methods
 * 12. Instance methods
 */

// =============================================================================
// 1. USER-DEFINED FUNCTIONS
// =============================================================================

/**
 * Basic function definition and usage
 */

// Standard function with parameters and return value
function add($a, $b) {
    return $a + $b;
}

echo "Addition: " . add(5, 3) . "\n";

// Function with default parameters
function greet($name = "Guest", $greeting = "Hello") {
    return "$greeting, $name!";
}

echo greet() . "\n"; // Hello, Guest!
echo greet("John") . "\n"; // Hello, John!
echo greet("John", "Hi") . "\n"; // Hi, John!

// =============================================================================
// 2. FUNCTION PARAMETERS - ALL POSSIBLE WAYS
// =============================================================================

// Type hints (PHP 5+)
function addTyped(int $a, int $b): int {
    return $a + $b;
}

echo "Typed addition: " . addTyped(5, 3) . "\n";

// Nullable parameters (PHP 7.1+)
function greetNullable(?string $name): string {
    return $name ? "Hello, $name!" : "Hello, Guest!";
}

echo greetNullable(null) . "\n"; // Hello, Guest!
echo greetNullable("Alice") . "\n"; // Hello, Alice!

// Union types (PHP 8.0+)
function processValue(int|string $value): int|string {
    return is_int($value) ? $value * 2 : strtoupper($value);
}

echo processValue(5) . "\n"; // 10
echo processValue("hello") . "\n"; // HELLO

// Variadic functions (PHP 5.6+)
function sum(...$numbers): int {
    return array_sum($numbers);
}

echo "Sum: " . sum(1, 2, 3, 4, 5) . "\n"; // 15

// Named parameters (PHP 8.0+)
function createUser($name, $email, $age = 18, $active = true) {
    return [
        'name' => $name,
        'email' => $email,
        'age' => $age,
        'active' => $active
    ];
}

$user = createUser(email: "john@example.com", name: "John", age: 25);
print_r($user);

// Passing by reference
function increment(&$value): void {
    $value++;
}

$num = 5;
increment($num);
echo "Incremented: $num\n"; // 6

// =============================================================================
// 3. RETURN TYPES - ALL POSSIBLE WAYS
// =============================================================================

// Void return type (PHP 7.1+)
function logMessage(string $message): void {
    echo "Log: $message\n";
}

logMessage("This is a log message");

// Never return type (PHP 8.1+) - function never returns normally
function redirect(string $url): never {
    header("Location: $url");
    exit;
}

// Mixed return type (PHP 8.0+)
function getRandomValue(): mixed {
    return rand(0, 1) ? "string" : 42;
}

echo "Random value: " . getRandomValue() . "\n";

// Multiple return values using arrays
function getUserInfo(): array {
    return [
        'name' => 'John Doe',
        'age' => 30,
        'email' => 'john@example.com'
    ];
}

$userInfo = getUserInfo();
echo "User: {$userInfo['name']}, Age: {$userInfo['age']}\n";

// Early returns for better readability
function checkAge(int $age): string {
    if ($age < 0) {
        return "Invalid age";
    }
    if ($age < 18) {
        return "Minor";
    }
    if ($age < 65) {
        return "Adult";
    }
    return "Senior";
}

echo "Age check: " . checkAge(25) . "\n";

// =============================================================================
// 4. ANONYMOUS FUNCTIONS (CLOSURES)
// =============================================================================

// Basic anonymous function
$square = function ($x) {
    return $x * $x;
};

echo "Square: " . $square(5) . "\n"; // 25

// Anonymous function with use clause (capturing variables)
$message = "Hello";
$greet = function ($name) use ($message) {
    return "$message, $name!";
};

echo $greet("World") . "\n";

// Modifying captured variables (by reference)
$counter = 0;
$increment = function () use (&$counter) {
    $counter++;
    return $counter;
};

echo "Counter: " . $increment() . "\n"; // 1
echo "Counter: " . $increment() . "\n"; // 2

// Anonymous function as callback
$numbers = [1, 2, 3, 4, 5];
$evenNumbers = array_filter($numbers, function($n) {
    return $n % 2 === 0;
});

echo "Even numbers: " . implode(", ", $evenNumbers) . "\n";

// =============================================================================
// 5. ARROW FUNCTIONS (PHP 7.4+)
// =============================================================================

// Short syntax for simple closures
$numbers = [1, 2, 3, 4, 5];
$squares = array_map(fn($x) => $x * $x, $numbers);
echo "Squares: " . implode(", ", $squares) . "\n";

// Arrow functions automatically capture variables from parent scope
$multiplier = 3;
$multiply = fn($x) => $x * $multiplier;
echo "Multiplied: " . $multiply(5) . "\n"; // 15

// More complex arrow function
$users = [
    ['name' => 'John', 'age' => 25],
    ['name' => 'Jane', 'age' => 30],
    ['name' => 'Bob', 'age' => 20]
];

$names = array_map(fn($user) => $user['name'], $users);
echo "Names: " . implode(", ", $names) . "\n";

// =============================================================================
// 6. GENERATOR FUNCTIONS
// =============================================================================

// Basic generator - yields values one by one
function fibonacci($n) {
    $a = 0;
    $b = 1;
    for ($i = 0; $i < $n; $i++) {
        yield $a;
        $temp = $a;
        $a = $b;
        $b = $temp + $b;
    }
}

echo "Fibonacci: ";
foreach (fibonacci(10) as $num) {
    echo $num . " ";
}
echo "\n";

// Generator with keys
function keyValueGenerator() {
    yield "name" => "John";
    yield "age" => 30;
    yield "city" => "New York";
}

foreach (keyValueGenerator() as $key => $value) {
    echo "$key: $value\n";
}

// Generator delegation (PHP 7.0+)
function combinedGenerator() {
    yield from [1, 2, 3];
    yield from fibonacci(5);
}

echo "Combined: ";
foreach (combinedGenerator() as $value) {
    echo $value . " ";
}
echo "\n";

// =============================================================================
// 7. RECURSIVE FUNCTIONS
// =============================================================================

// Basic recursion
function factorial(int $n): int {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

echo "Factorial of 5: " . factorial(5) . "\n";

// Tail recursion (conceptual - PHP doesn't optimize it)
function tailFactorial(int $n, int $acc = 1): int {
    if ($n <= 1) {
        return $acc;
    }
    return tailFactorial($n - 1, $n * $acc);
}

echo "Tail factorial of 5: " . tailFactorial(5) . "\n";

// Recursive directory traversal
function listFiles($dir) {
    if (!is_dir($dir)) {
        return;
    }

    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        $path = $dir . DIRECTORY_SEPARATOR . $file;
        if (is_dir($path)) {
            echo "Directory: $path\n";
            listFiles($path); // Recurse
        } else {
            echo "File: $path\n";
        }
    }
}

// listFiles(__DIR__); // Uncomment to see directory listing

// =============================================================================
// 8. VARIABLE FUNCTIONS
// =============================================================================

// Calling functions dynamically using variables
function sayHello() {
    return "Hello!";
}

function sayGoodbye() {
    return "Goodbye!";
}

$functionName = "sayHello";
echo $functionName() . "\n";

$functions = ['sayHello', 'sayGoodbye'];
foreach ($functions as $func) {
    echo $func() . "\n";
}

// Using call_user_func
echo call_user_func('sayHello') . "\n";

// Using call_user_func_array
echo call_user_func_array('add', [5, 3]) . "\n";

// =============================================================================
// 9. CALLBACK FUNCTIONS
// =============================================================================

// Built-in functions with callbacks
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$evenNumbers = array_filter($numbers, function($n) {
    return $n % 2 === 0;
});

$squaredNumbers = array_map(function($n) {
    return $n * $n;
}, $evenNumbers);

echo "Even squares: " . implode(", ", $squaredNumbers) . "\n";

// Custom function with callback parameter
function processArray(array $array, callable $callback): array {
    $result = [];
    foreach ($array as $item) {
        $result[] = $callback($item);
    }
    return $result;
}

$processed = processArray([1, 2, 3, 4], fn($x) => $x * 3);
echo "Processed: " . implode(", ", $processed) . "\n";

// =============================================================================
// 10. STATIC VARIABLES IN FUNCTIONS
// =============================================================================

// Static variables retain their value between function calls
function counter() {
    static $count = 0;
    $count++;
    return $count;
}

echo "Call 1: " . counter() . "\n"; // 1
echo "Call 2: " . counter() . "\n"; // 2
echo "Call 3: " . counter() . "\n"; // 3

// Static variable for caching
function expensiveOperation($input) {
    static $cache = [];

    if (isset($cache[$input])) {
        echo "From cache: ";
        return $cache[$input];
    }

    // Simulate expensive operation
    $result = $input * $input * $input;
    $cache[$input] = $result;

    echo "Calculated: ";
    return $result;
}

echo expensiveOperation(5) . "\n"; // Calculated: 125
echo expensiveOperation(5) . "\n"; // From cache: 125

// =============================================================================
// 11. HIGHER-ORDER FUNCTIONS
// =============================================================================

// Functions that take functions as parameters or return functions
function createMultiplier($factor) {
    return fn($x) => $x * $factor;
}

$double = createMultiplier(2);
$triple = createMultiplier(3);

echo "Double 5: " . $double(5) . "\n"; // 10
echo "Triple 5: " . $triple(5) . "\n"; // 15

// Function that takes a function as parameter
function applyOperation($value, callable $operation) {
    return $operation($value);
}

echo "Apply square: " . applyOperation(5, fn($x) => $x * $x) . "\n";

// =============================================================================
// 12. FUNCTION OVERLOADING (SIMULATED)
// =============================================================================

// PHP doesn't support true function overloading, but we can simulate it
function addNumbers() {
    $args = func_get_args();
    $sum = 0;
    foreach ($args as $arg) {
        $sum += $arg;
    }
    return $sum;
}

echo "Add 2 numbers: " . addNumbers(1, 2) . "\n"; // 3
echo "Add 4 numbers: " . addNumbers(1, 2, 3, 4) . "\n"; // 10

// =============================================================================
// 13. CLOSURES AND VARIABLE SCOPE
// =============================================================================

// Closures can access variables from parent scope
function createCounter() {
    $count = 0;
    return function() use (&$count) {
        $count++;
        return $count;
    };
}

$counter1 = createCounter();
$counter2 = createCounter();

echo "Counter1: " . $counter1() . "\n"; // 1
echo "Counter1: " . $counter1() . "\n"; // 2
echo "Counter2: " . $counter2() . "\n"; // 1

// =============================================================================
// 14. ERROR HANDLING IN FUNCTIONS
// =============================================================================

function divide($a, $b) {
    if ($b === 0) {
        throw new Exception("Division by zero");
    }
    return $a / $b;
}

try {
    echo "Division: " . divide(10, 2) . "\n";
    echo "Division: " . divide(10, 0) . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// =============================================================================
// 15. FUNCTION ATTRIBUTES (PHP 8.0+)
// =============================================================================

#[Deprecated("Use newFunction instead")]
function oldFunction() {
    return "This function is deprecated";
}

echo oldFunction() . "\n";

// =============================================================================
// 16. BUILT-IN FUNCTIONS
// =============================================================================

// PHP has thousands of built-in functions
echo "String length: " . strlen("Hello") . "\n";
echo "Array sum: " . array_sum([1, 2, 3]) . "\n";
echo "Current date: " . date("Y-m-d") . "\n";
echo "Random number: " . rand(1, 100) . "\n";

// =============================================================================
// 17. MAGIC METHODS (CLASS FUNCTIONS)
// =============================================================================

class ExampleClass {
    private $data = [];

    public function __construct() {
        echo "Object created\n";
    }

    public function __destruct() {
        echo "Object destroyed\n";
    }

    public function __toString() {
        return "ExampleClass instance with " . count($this->data) . " properties";
    }

    public function __get($name) {
        return $this->data[$name] ?? "Property '$name' not found";
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
        echo "Setting $name to $value\n";
    }

    public function __isset($name) {
        return isset($this->data[$name]);
    }

    public function __unset($name) {
        unset($this->data[$name]);
    }

    public static function __callStatic($name, $arguments) {
        echo "Calling static method $name with arguments: " . implode(", ", $arguments) . "\n";
    }

    public function __call($name, $arguments) {
        echo "Calling method $name with arguments: " . implode(", ", $arguments) . "\n";
    }

    public function __invoke($arg) {
        return "Object called as function with: $arg";
    }
}

$obj = new ExampleClass();
echo $obj . "\n";
echo $obj->nonExistentProperty . "\n";
$obj->newProperty = "value";
ExampleClass::staticMethod("arg1", "arg2");
echo $obj("test") . "\n";

// =============================================================================
// 18. STATIC METHODS AND PROPERTIES
// =============================================================================

class StaticExample {
    public static $staticProperty = "static value";
    public $instanceProperty = "instance value";

    public static function staticMethod() {
        return "This is a static method";
    }

    public function instanceMethod() {
        return "This is an instance method";
    }

    public static function accessStatic() {
        return self::$staticProperty;
    }
}

echo StaticExample::$staticProperty . "\n";
echo StaticExample::staticMethod() . "\n";
echo StaticExample::accessStatic() . "\n";

// =============================================================================
// 19. ADVANCED FUNCTION CONCEPTS
// =============================================================================

// Currying
function curryAdd($a) {
    return fn($b) => $a + $b;
}

$add5 = curryAdd(5);
echo "Curried add: " . $add5(3) . "\n"; // 8

// Memoization
function memoize($func) {
    $cache = [];
    return function($arg) use ($func, &$cache) {
        if (!isset($cache[$arg])) {
            $cache[$arg] = $func($arg);
        }
        return $cache[$arg];
    };
}

$memoizedFactorial = memoize('factorial');
echo "Memoized factorial: " . $memoizedFactorial(5) . "\n";

// Function composition
function compose($f, $g) {
    return fn($x) => $f($g($x));
}

$add1 = fn($x) => $x + 1;
$multiply2 = fn($x) => $x * 2;

$add1ThenMultiply2 = compose($multiply2, $add1);
echo "Composed function: " . $add1ThenMultiply2(5) . "\n"; // (5 + 1) * 2 = 12

// =============================================================================
// 20. FUNCTION DOCUMENTATION (PHPDoc)
// =============================================================================

/**
 * Calculates the area of a rectangle.
 *
 * This function demonstrates proper PHPDoc documentation.
 *
 * @param float $width The width of the rectangle
 * @param float $height The height of the rectangle
 * @return float The calculated area
 * @throws InvalidArgumentException If width or height is negative
 */
function calculateRectangleArea(float $width, float $height): float {
    if ($width < 0 || $height < 0) {
        throw new InvalidArgumentException("Width and height must be positive");
    }
    return $width * $height;
}

echo "Rectangle area: " . calculateRectangleArea(5.0, 10.0) . "\n";

// =============================================================================
// 21. BEST PRACTICES AND PERFORMANCE
// =============================================================================

/**
 * Best Practices:
 * 1. Use descriptive function names that indicate what they do
 * 2. Keep functions small and focused (Single Responsibility Principle)
 * 3. Use type hints when possible for better code quality
 * 4. Document functions with PHPDoc comments
 * 5. Avoid global variables in functions
 * 6. Use early returns for better readability
 * 7. Consider performance implications of recursive functions
 * 8. Use static variables judiciously
 * 9. Prefer named parameters for functions with many parameters
 * 10. Handle errors appropriately
 *
 * Performance Tips:
 * - Minimize function calls in tight loops
 * - Use built-in functions when possible
 * - Consider using references for large data structures
 * - Cache expensive operations
 * - Profile code to identify bottlenecks
 */

// =============================================================================
// 22. PRACTICAL EXAMPLES
// =============================================================================

// Utility function for data validation
function validateEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validatePassword(string $password): bool {
    return strlen($password) >= 8 &&
           preg_match('/[A-Z]/', $password) &&
           preg_match('/[a-z]/', $password) &&
           preg_match('/[0-9]/', $password);
}

// Data processing pipeline
function processUserData(array $userData): array {
    $processed = [];

    foreach ($userData as $user) {
        if (validateEmail($user['email']) && validatePassword($user['password'])) {
            $processed[] = [
                'id' => $user['id'],
                'name' => ucwords(strtolower($user['name'])),
                'email' => strtolower($user['email']),
                'validated' => true
            ];
        }
    }

    return $processed;
}

// Example usage
$rawUsers = [
    ['id' => 1, 'name' => 'john DOE', 'email' => 'john@example.com', 'password' => 'Password123'],
    ['id' => 2, 'name' => 'jane smith', 'email' => 'invalid-email', 'password' => 'weak']
];

$processedUsers = processUserData($rawUsers);
print_r($processedUsers);

// =============================================================================
// CONCLUSION
// =============================================================================

/**
 * This guide covers all major types of functions in PHP and various ways to use them.
 * Functions are essential for organizing code, promoting reusability, and improving maintainability.
 *
 * Key takeaways:
 * - Choose the right type of function for each use case
 * - Use modern PHP features when possible (type hints, arrow functions, etc.)
 * - Follow best practices for clean, maintainable code
 * - Consider performance implications
 * - Document your functions properly
 */

?>
