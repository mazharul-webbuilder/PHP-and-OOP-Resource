<?php

/**
 * PHP Traits Guideline
 *
 * Traits in PHP provide a mechanism for code reuse in single inheritance languages like PHP.
 * A trait is similar to a class but is intended to group functionality in a fine-grained and consistent way.
 * Traits cannot be instantiated on their own; they must be included in a class using the 'use' keyword.
 *
 * Below are all possible things you can do with PHP traits, demonstrated with examples.
 */

// 1. Basic Trait Definition
// Traits can contain methods and properties just like classes.
trait BasicTrait {
    public $property = 'default value';

    public function basicMethod() {
        return 'This is a basic method in a trait.';
    }
}

// 2. Using Multiple Traits in a Class
// A class can use multiple traits by separating them with commas.
class ExampleClass {
    use BasicTrait, ResponseTrait; // Assuming ResponseTrait is defined elsewhere

    public function classMethod() {
        return $this->basicMethod();
    }
}

// 3. Abstract Methods in Traits
// Traits can define abstract methods that must be implemented by the using class.
trait AbstractTrait {
    abstract public function mustImplement();

    public function concreteMethod() {
        return 'This method is concrete.';
    }
}

// 4. Static Methods and Properties in Traits
// Traits can have static members.
trait StaticTrait {
    public static $staticProperty = 'static value';

    public static function staticMethod() {
        return 'This is a static method.';
    }
}

// 5. Visibility Modifiers
// Methods and properties in traits can have public, protected, or private visibility.
trait VisibilityTrait {
    public $publicProp = 'public';
    protected $protectedProp = 'protected';
    private $privateProp = 'private';

    public function publicMethod() {}
    protected function protectedMethod() {}
    private function privateMethod() {}
}

// 6. Method Overriding and Conflict Resolution
// When two traits have methods with the same name, you can resolve conflicts using 'insteadof' and 'as'.
trait TraitA {
    public function conflictingMethod() {
        return 'From TraitA';
    }
}

trait TraitB {
    public function conflictingMethod() {
        return 'From TraitB';
    }
}

class ConflictResolution {
    use TraitA, TraitB {
        TraitA::conflictingMethod insteadof TraitB; // Use TraitA's method
        TraitB::conflictingMethod as methodFromB; // Alias TraitB's method
    }
}

// 7. Aliasing Methods
// You can alias methods to avoid naming conflicts or to provide alternative names.
trait AliasTrait {
    public function originalMethod() {
        return 'Original';
    }
}

class AliasExample {
    use AliasTrait {
        originalMethod as aliasedMethod;
    }
}

// 8. Changing Visibility of Methods
// You can change the visibility of a method from a trait when using it.
trait VisibilityChangeTrait {
    public function methodToChange() {
        return 'Method';
    }
}

class VisibilityChange {
    use VisibilityChangeTrait {
        methodToChange as protected; // Change to protected
    }
}

// 9. Traits Using Other Traits
// Traits can use other traits, allowing composition.
trait BaseTrait {
    public function baseMethod() {
        return 'Base';
    }
}

trait ComposedTrait {
    use BaseTrait;

    public function composedMethod() {
        return $this->baseMethod() . ' Composed';
    }
}

// 10. Constants in Traits (PHP 8.1+)
// Traits can define constants.
trait ConstantTrait {
    const TRAIT_CONSTANT = 'constant value';

    public function getConstant() {
        return self::TRAIT_CONSTANT;
    }
}

// 11. Properties with Default Values
// Traits can define properties with default values.
trait PropertyTrait {
    public $configurableProperty = 'default';
    protected static $staticProp = 0;
}

// 12. Constructors and Destructors in Traits
// Traits can have constructors, but they are not automatically called unless defined in the using class.
// It's generally not recommended to use constructors in traits to avoid conflicts.
trait ConstructorTrait {
    public function __construct() {
        // This will conflict if the using class also has __construct
        echo 'Trait constructor called';
    }
}

// 13. Magic Methods in Traits
// Traits can define magic methods like __get, __set, etc.
trait MagicTrait {
    private $data = [];

    public function __get($name) {
        return $this->data[$name] ?? null;
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }
}

// 14. Traits with Interfaces
// While traits themselves can't implement interfaces, classes using traits can implement interfaces
// and use traits to provide some of the implementation.
interface ExampleInterface {
    public function interfaceMethod();
}

trait InterfaceTrait {
    public function interfaceMethod() {
        return 'Implemented via trait';
    }
}

class InterfaceExample implements ExampleInterface {
    use InterfaceTrait;
}

// 15. Nested Traits Usage
// Traits can be used within other traits or classes dynamically, but typically through 'use'.
class NestedExample {
    use ComposedTrait; // Which uses BaseTrait
}

// 16. Traits and Inheritance
// Traits work with inheritance; a class can extend another class and use traits.
class ParentClass {
    public function parentMethod() {
        return 'Parent';
    }
}

class ChildWithTrait extends ParentClass {
    use BasicTrait;

    public function childMethod() {
        return $this->parentMethod() . ' ' . $this->basicMethod();
    }
}

// 17. Final Methods in Traits
// Methods in traits can be declared as final.
trait FinalTrait {
    final public function finalMethod() {
        return 'This cannot be overridden';
    }
}

// 18. Traits with Type Hints
// Traits can use type hints in method parameters and return types.
trait TypeHintTrait {
    public function typedMethod(string $input): string {
        return strtoupper($input);
    }
}

// 19. Using Traits in Anonymous Classes (PHP 7+)
// Anonymous classes can use traits.
$anonymous = new class {
    use BasicTrait;
};

// 20. Traits and Namespaces
// Traits can be defined within namespaces.
namespace MyNamespace;

trait NamespacedTrait {
    public function namespacedMethod() {
        return 'Namespaced';
    }
}

// Note: To use this, you'd do: use MyNamespace\NamespacedTrait;

// 21. Best Practices and Limitations
/*
 * Best Practices:
 * - Use traits for horizontal code reuse (across classes that don't inherit from each other).
 * - Avoid using constructors in traits to prevent conflicts.
 * - Use descriptive names for traits.
 * - Resolve conflicts explicitly when using multiple traits.
 *
 * Limitations:
 * - Traits cannot be instantiated directly.
 * - A class cannot extend multiple classes, but can use multiple traits.
 * - Traits cannot define constants until PHP 8.1.
 * - Property conflicts between traits and classes can occur.
 * - Traits are copied into the using class at compile time, not inherited.
 */

// Example Usage
class CompleteExample {
    use BasicTrait, StaticTrait, ConstantTrait, TypeHintTrait {
        BasicTrait::basicMethod as public; // Ensure visibility
    }

    public function __construct() {
        echo $this->basicMethod();
        echo self::staticMethod();
        echo self::TRAIT_CONSTANT;
    }
}

// Uncomment to test (requires proper setup)
// $obj = new CompleteExample();

?>