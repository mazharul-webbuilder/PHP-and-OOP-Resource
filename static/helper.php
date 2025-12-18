<?php

/**
 * PHP Static Keyword Guideline
 *
 * The static keyword in PHP is used to declare properties and methods that belong to the class itself
 * rather than to any specific instance of the class. Static members are shared across all instances
 * of the class and can be accessed without creating an object.
 *
 * Below are all possible uses and behaviors of the static keyword in PHP.
 */

// 1. Static Properties
// Shared among all instances of the class. Changes affect all instances.
class StaticProperties {
    public static $sharedCounter = 0;
    public $instanceCounter = 0;

    public function increment() {
        self::$sharedCounter++;
        $this->instanceCounter++;
    }
}

$obj1 = new StaticProperties();
$obj2 = new StaticProperties();

$obj1->increment();
echo "Obj1 shared: " . StaticProperties::$sharedCounter . ", instance: " . $obj1->instanceCounter . "\n";
echo "Obj2 shared: " . StaticProperties::$sharedCounter . ", instance: " . $obj2->instanceCounter . "\n";

// 2. Static Methods
// Can be called without instantiating the class.
class StaticMethods {
    public static function staticMethod() {
        return "Called without instantiation";
    }

    public function instanceMethod() {
        return "Requires instantiation";
    }
}

echo StaticMethods::staticMethod() . "\n";

// 3. Accessing Static Members from Instance Methods
// Use self:: or static:: to access static members from within the class.
class AccessingStatic {
    public static $staticProp = "static value";

    public function accessStatic() {
        return self::$staticProp; // or static::$staticProp
    }
}

$obj = new AccessingStatic();
echo $obj->accessStatic() . "\n";

// 4. Static Variables in Functions
// Retain their value between function calls.
function staticVariableExample() {
    static $counter = 0;
    $counter++;
    echo "Counter: $counter\n";
}

staticVariableExample(); // 1
staticVariableExample(); // 2
staticVariableExample(); // 3

// 5. Late Static Binding (static::)
// Allows for proper inheritance of static methods.
class ParentClass {
    public static function whoAmI() {
        return "Parent";
    }

    public static function test() {
        return static::whoAmI(); // Uses the called class, not the defining class
    }
}

class ChildClass extends ParentClass {
    public static function whoAmI() {
        return "Child";
    }
}

echo ParentClass::test() . "\n"; // Parent
echo ChildClass::test() . "\n";  // Child

// 6. Static Constants
// Constants are implicitly static and accessed via ClassName::CONSTANT
class StaticConstants {
    const STATIC_CONST = "I'm static";
    const NON_STATIC_CONST = "Me too"; // All constants are static

    public static function getConst() {
        return self::STATIC_CONST;
    }
}

echo StaticConstants::STATIC_CONST . "\n";
echo StaticConstants::getConst() . "\n";

// 7. Static Methods in Interfaces (PHP 8.1+)
// Interfaces can have static methods.
interface StaticInterface {
    public static function staticMethod();
}

class ImplementingClass implements StaticInterface {
    public static function staticMethod() {
        return "Static method in interface";
    }
}

echo ImplementingClass::staticMethod() . "\n";

// 8. Static Closures
// Closures can be declared as static to prevent capturing $this.
class StaticClosures {
    private $instanceVar = "instance";

    public function createClosure() {
        $staticClosure = static function () {
            // Cannot access $this
            return "Static closure";
        };

        $instanceClosure = function () {
            return $this->instanceVar;
        };

        return [$staticClosure, $instanceClosure];
    }
}

$closures = (new StaticClosures())->createClosure();
echo $closures[0]() . "\n"; // Static closure
echo $closures[1]() . "\n"; // instance

// 9. Static in Anonymous Classes
// Anonymous classes can have static members.
$anonymousClass = new class {
    public static $staticProp = "anonymous static";

    public static function staticMethod() {
        return "anonymous static method";
    }
};

echo $anonymousClass::$staticProp . "\n";
echo $anonymousClass::staticMethod() . "\n";

// 10. Static Properties in Traits
// Traits can have static properties and methods.
trait StaticTrait {
    public static $traitStatic = "trait static";

    public static function traitStaticMethod() {
        return "trait static method";
    }
}

class UsingTrait {
    use StaticTrait;
}

echo UsingTrait::$traitStatic . "\n";
echo UsingTrait::traitStaticMethod() . "\n";

// 11. Static Return Types
// Methods can return static for late static binding.
class StaticReturn {
    public static function create(): static {
        return new static();
    }

    public function getClassName() {
        return get_class($this);
    }
}

class ChildStaticReturn extends StaticReturn {}

$child = ChildStaticReturn::create();
echo $child->getClassName() . "\n"; // ChildStaticReturn

// 12. Static vs self
// self:: refers to the class where it's defined, static:: to the class where it's called.
class SelfVsStatic {
    public static function selfExample() {
        return self::who();
    }

    public static function staticExample() {
        return static::who();
    }

    protected static function who() {
        return __CLASS__;
    }
}

class ChildSelfVsStatic extends SelfVsStatic {
    protected static function who() {
        return __CLASS__;
    }
}

echo SelfVsStatic::selfExample() . "\n";     // SelfVsStatic
echo SelfVsStatic::staticExample() . "\n";  // SelfVsStatic
echo ChildSelfVsStatic::selfExample() . "\n";   // SelfVsStatic
echo ChildSelfVsStatic::staticExample() . "\n"; // ChildSelfVsStatic

// 13. Static Initializers (Not directly supported)
// PHP doesn't have static initializers like some languages, but you can use static methods.
class StaticInitializer {
    public static $initialized = false;

    public static function init() {
        if (!self::$initialized) {
            // Initialization code
            self::$initialized = true;
            echo "Initialized\n";
        }
    }
}

StaticInitializer::init();

// 14. Static Properties with Visibility
// Static properties can be public, protected, or private.
class StaticVisibility {
    public static $publicStatic = "public";
    protected static $protectedStatic = "protected";
    private static $privateStatic = "private";

    public static function accessPrivate() {
        return self::$privateStatic;
    }
}

echo StaticVisibility::$publicStatic . "\n";
// echo StaticVisibility::$protectedStatic; // Fatal error
echo StaticVisibility::accessPrivate() . "\n";

// 15. Static Methods Overriding
// Static methods can be overridden in child classes.
class ParentStatic {
    public static function overridden() {
        return "Parent";
    }
}

class ChildStatic extends ParentStatic {
    public static function overridden() {
        return "Child";
    }
}

echo ParentStatic::overridden() . "\n";
echo ChildStatic::overridden() . "\n";

// 16. Using Static in Global Functions
// Functions can have static variables, but not be declared static themselves.
function globalStatic() {
    static $count = 0;
    $count++;
    return $count;
}

echo globalStatic() . "\n"; // 1
echo globalStatic() . "\n"; // 2

// 17. Static and Serialization
// Static properties are not serialized with objects.
class SerializableStatic {
    public $instanceProp = "instance";
    public static $staticProp = "static";
}

$obj = new SerializableStatic();
$serialized = serialize($obj);
$unserialized = unserialize($serialized);

echo "Instance prop: " . $unserialized->instanceProp . "\n";
echo "Static prop: " . SerializableStatic::$staticProp . "\n";

// 18. Best Practices and Limitations
/*
 * Best Practices:
 * - Use static for utility functions that don't need instance state.
 * - Prefer static:: over self:: for inheritance-friendly code.
 * - Initialize static properties at declaration time when possible.
 * - Use static methods for factory patterns.
 * - Avoid static properties for mutable state that could cause issues in testing.
 *
 * Limitations:
 * - Static methods cannot access $this.
 * - Static properties are shared across all instances and requests.
 * - Cannot use static with function parameters or local variables (except in function scope).
 * - Static members are not inherited in the same way as instance members.
 * - Cannot serialize static properties.
 */

// Example: Utility Class
class MathHelper {
    public static function factorial(int $n): int {
        if ($n <= 1) return 1;
        return $n * self::factorial($n - 1);
    }

    public static function isPrime(int $n): bool {
        if ($n < 2) return false;
        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i == 0) return false;
        }
        return true;
    }
}

echo "Factorial of 5: " . MathHelper::factorial(5) . "\n";
echo "Is 7 prime? " . (MathHelper::isPrime(7) ? 'Yes' : 'No') . "\n";

?>