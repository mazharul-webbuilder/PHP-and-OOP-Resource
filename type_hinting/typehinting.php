<?php

/**
 * PHP Type Hinting Guideline
 *
 * Type hinting in PHP allows you to specify the expected data types for function parameters, return values, and class properties.
 * This improves code reliability, readability, and enables better IDE support and static analysis.
 * Type hinting was introduced in PHP 5 and has evolved significantly in later versions.
 *
 * Below are all possible things you can do with PHP type hinting, demonstrated with examples.
 */

// 1. Enabling Strict Types
// Use declare(strict_types=1) at the top of the file to enforce strict type checking.
// Without this, PHP will attempt type coercion (e.g., string "1" to int 1).
declare(strict_types=1);

// 2. Scalar Types
// Basic scalar types: int, float, string, bool
function scalarExample(int $integer, float $floating, string $text, bool $boolean): string {
    return "Int: $integer, Float: $floating, String: $text, Bool: " . ($boolean ? 'true' : 'false');
}

// 3. Array Type
// Use array for any array type.
function arrayExample(array $arr): array {
    return array_reverse($arr);
}

// 4. Object Types
// Specify class or interface names.
class ExampleClass {
    public function method(): string {
        return 'example';
    }
}

interface ExampleInterface {
    public function interfaceMethod(): string;
}

function objectExample(ExampleClass $obj): string {
    return $obj->method();
}

function interfaceExample(ExampleInterface $obj): string {
    return $obj->interfaceMethod();
}

// 5. Callable Type
// For functions or methods that can be called.
function callableExample(callable $callback): mixed {
    return $callback();
}

// 6. Iterable Type (PHP 7.1+)
// Accepts arrays or objects implementing Traversable.
function iterableExample(iterable $items): void {
    foreach ($items as $item) {
        echo $item . ' ';
    }
}

// 7. Void Return Type (PHP 7.1+)
// Indicates the function doesn't return a value.
function voidExample(): void {
    echo 'This function returns nothing.';
}

// 8. Nullable Types (PHP 7.1+)
// Use ? before the type to allow null.
function nullableExample(?string $text): ?int {
    return $text ? strlen($text) : null;
}

// 9. Union Types (PHP 8.0+)
// Specify multiple possible types separated by |.
function unionExample(int|string $value): int|string {
    return is_int($value) ? $value * 2 : strtoupper($value);
}

// 10. Mixed Type (PHP 8.0+)
// Accepts any type. Use when you don't know or care about the type.
function mixedExample(mixed $anything): mixed {
    return $anything;
}

// 11. Never Return Type (PHP 8.1+)
// Indicates the function never returns (e.g., throws exception or exits).
function neverExample(): never {
    throw new Exception('This function never returns normally.');
}

// 12. Intersection Types (PHP 8.1+)
// Specify that the parameter must implement multiple interfaces (use &).
interface InterfaceA {}
interface InterfaceB {}

class IntersectionClass implements InterfaceA, InterfaceB {}

function intersectionExample(InterfaceA & InterfaceB $obj): void {
    // $obj implements both interfaces
}

// 13. Self and Parent Types
// self refers to the current class, parent to the parent class.
class ParentClass {
    public function parentMethod(): string {
        return 'parent';
    }
}

class ChildClass extends ParentClass {
    public function selfExample(self $obj): string {
        return $obj->parentMethod();
    }

    public function parentExample(parent $obj): string {
        return $obj->parentMethod();
    }
}

// 14. Typed Properties (PHP 7.4+)
// Class properties can have type declarations.
class TypedProperties {
    public int $integerProp;
    public ?string $nullableStringProp;
    public array $arrayProp;
    private ExampleClass $objectProp;

    public function __construct(int $int, ?string $str, array $arr, ExampleClass $obj) {
        $this->integerProp = $int;
        $this->nullableStringProp = $str;
        $this->arrayProp = $arr;
        $this->objectProp = $obj;
    }
}

// 15. Constructor Property Promotion (PHP 8.0+)
// Combine parameter and property declaration in constructor.
class ConstructorPromotion {
    public function __construct(
        public int $id,
        public string $name,
        private ?float $price = null
    ) {}
}

// 16. Static Return Type
// Use static for late static binding return types.
class StaticExample {
    public static function create(): static {
        return new static();
    }
}

// 17. Covariance and Contravariance (PHP 7.4+ for properties, 8.0+ for methods)
// Covariance: more specific return types in subclasses.
// Contravariance: more general parameter types in subclasses.
abstract class Animal {
    abstract public function eat(Food $food): string;
}

abstract class Food {}

class DogFood extends Food {}

class Dog extends Animal {
    public function eat(Food $food): string { // Contravariant parameter (more general)
        return 'Dog eats food';
    }
}

class Cat extends Animal {
    public function eat(DogFood $food): string { // This would be covariant return, but PHP doesn't support covariant parameters easily
        return 'Cat eats specific food';
    }
}

// 18. Type Hinting in Anonymous Functions and Closures
$closure = function (int $x, int $y): int {
    return $x + $y;
};

// 19. Type Hinting in Arrow Functions (PHP 7.4+)
$arrow = fn(int $x, int $y): int => $x + $y;

// 20. Enums as Types (PHP 8.1+)
// Enums can be used as type hints.
enum Status {
    case Active;
    case Inactive;
}

function enumExample(Status $status): string {
    return match ($status) {
        Status::Active => 'The status is active',
        Status::Inactive => 'The status is inactive',
    };
}

// 21. Resource Type (Limited)
// PHP has a resource type, but it's rarely used in type hints as it's not very specific.
function resourceExample($res): bool {
    return is_resource($res);
}

// 22. Using Type Hints with Generators
function generatorExample(): Generator {
    yield 1;
    yield 2;
}

// 23. Type Hints in Interfaces
interface TypedInterface {
    public function method(int $param): string;
}

class ImplementingClass implements TypedInterface {
    public function method(int $param): string {
        return "Parameter: $param";
    }
}

// 24. Abstract Methods with Type Hints
abstract class AbstractClass {
    abstract public function abstractMethod(string $input): ?int;
}

// 25. Type Hints with Variadic Parameters
function variadicExample(int ...$numbers): int {
    return array_sum($numbers);
}

// 26. Best Practices and Notes
/*
 * Best Practices:
 * - Use strict_types for better type safety.
 * - Use nullable types (?) when null is acceptable.
 * - Prefer union types over mixed when possible for better specificity.
 * - Use typed properties to enforce class invariants.
 * - Leverage constructor property promotion for concise code.
 * - Use intersection types for multiple interface requirements.
 *
 * Limitations and Notes:
 * - Type hints are checked at runtime, not compile time.
 * - Scalar types require PHP 7.0+, strict_types for enforcement.
 * - Union types available from PHP 8.0+.
 * - Intersection types from PHP 8.1+.
 * - Generics are not natively supported; use docblocks or attributes.
 * - Type hints don't prevent all type-related errors; combine with testing.
 * - Some types like resource are not very useful in hints.
 */

// Example Usage
try {
    $obj = new TypedProperties(1, 'hello', [1, 2, 3], new ExampleClass());
    echo scalarExample(1, 2.5, 'text', true) . PHP_EOL;
    echo arrayExample([1, 2, 3]) . PHP_EOL;
    echo nullableExample('test') . PHP_EOL;
    echo unionExample(5) . PHP_EOL;
    echo enumExample(Status::Active) . PHP_EOL;
} catch (TypeError $e) {
    echo 'Type error: ' . $e->getMessage() . PHP_EOL;
}

?>
