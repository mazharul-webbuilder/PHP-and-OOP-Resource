<?php

/**
 * PHP stdClass Guideline
 *
 * stdClass is a built-in generic empty class in PHP. It has no predefined properties or methods.
 * It's primarily used for creating dynamic objects on the fly, especially when working with JSON data
 * or when you need a simple object without defining a custom class.
 *
 * stdClass objects can have properties added dynamically at runtime.
 * All possible operations and uses of stdClass are demonstrated below.
 */

// 1. Creating a stdClass Instance
// Use the new keyword to create an empty stdClass object.
$emptyObject = new stdClass();
echo "Empty object created.\n";

// 2. Adding Properties Dynamically
// You can add any properties to a stdClass object at runtime.
$person = new stdClass();
$person->name = "John Doe";
$person->age = 30;
$person->city = "Example City";
echo "Name: " . $person->name . "\n";
echo "Age: " . $person->age . "\n";
echo "City: " . $person->city . "\n";

// 3. Modifying Properties
// Existing properties can be changed.
$person->age = 31;
echo "Updated Age: " . $person->age . "\n";

// 4. Accessing Properties
// Use the -> operator to access properties.
echo "Accessing name: " . $person->name . "\n";

// 5. Checking if Properties Exist
// Use isset() to check if a property exists.
if (isset($person->name)) {
    echo "Name property exists.\n";
}

if (!isset($person->email)) {
    echo "Email property does not exist.\n";
}

// 6. Removing Properties
// Use unset() to remove properties from the object.
unset($person->city);
if (!isset($person->city)) {
    echo "City property has been removed.\n";
}

// 7. Iterating Over Properties
// stdClass objects can be iterated using foreach.
$person->email = "john@example.com";
$person->occupation = "Developer";

echo "Iterating over properties:\n";
foreach ($person as $key => $value) {
    echo "$key: $value\n";
}

// 8. Using stdClass with JSON
// json_decode() without the second parameter returns a stdClass object.
$jsonData = '{"name": "Alice", "age": 25, "city": "Wonderland"}';
$decodedObject = json_decode($jsonData); // Returns stdClass
echo "Decoded name: " . $decodedObject->name . "\n";

// Modifying and re-encoding
$decodedObject->age = 26;
$decodedObject->occupation = "Engineer";
$newJson = json_encode($decodedObject);
echo "Re-encoded JSON: " . $newJson . "\n";

// 9. Casting Arrays to stdClass Objects
// Use (object) to cast an array to a stdClass object.
$array = ['name' => 'Bob', 'age' => 35];
$objectFromArray = (object) $array;
echo "Casted object name: " . $objectFromArray->name . "\n";

// 10. Casting stdClass to Array
// Use (array) to cast a stdClass object to an array.
$arrayFromObject = (array) $person;
echo "Casted array: " . print_r($arrayFromObject, true) . "\n";

// 11. Comparing stdClass Objects
// Objects are compared by reference, not by value.
$person1 = new stdClass();
$person1->name = "John";

$person2 = new stdClass();
$person2->name = "John";

if ($person1 == $person2) {
    echo "Objects are equal by value.\n"; // This will be true
}

if ($person1 === $person2) {
    echo "Objects are identical by reference.\n"; // This will be false
}

// 12. Cloning stdClass Objects
// Use clone to create a shallow copy.
$clonedPerson = clone $person;
$clonedPerson->name = "Jane";
echo "Original name: " . $person->name . "\n"; // Still John
echo "Cloned name: " . $clonedPerson->name . "\n"; // Jane

// 13. Serializing and Unserializing
// stdClass objects can be serialized.
$serialized = serialize($person);
echo "Serialized: " . $serialized . "\n";

$unserialized = unserialize($serialized);
echo "Unserialized name: " . $unserialized->name . "\n";

// 14. Using stdClass as a Base Class
// You can extend stdClass, though it's rare.
class ExtendedStdClass extends stdClass {
    public function getPropertyCount() {
        return count((array) $this);
    }
}

$extended = new ExtendedStdClass();
$extended->prop1 = "value1";
$extended->prop2 = "value2";
echo "Property count: " . $extended->getPropertyCount() . "\n";

// 15. Type Hinting with stdClass
// You can use stdClass in type hints.
function processStdClass(stdClass $obj): stdClass {
    $obj->processed = true;
    return $obj;
}

$processed = processStdClass($person);
echo "Processed: " . ($processed->processed ? 'Yes' : 'No') . "\n";

// 16. Using stdClass for Anonymous Objects
// Create objects without a class name.
$anonymous = new class extends stdClass {
    public function customMethod() {
        return "Custom method";
    }
};
$anonymous->name = "Anonymous";
echo $anonymous->customMethod() . ": " . $anonymous->name . "\n";

// 17. stdClass and Magic Methods
// stdClass itself doesn't have magic methods, but you can add them by extending.
class MagicStdClass extends stdClass {
    public function __toString() {
        return json_encode($this);
    }

    public function __get($name) {
        return "Property '$name' not set";
    }
}

$magic = new MagicStdClass();
$magic->name = "Magic";
echo "Object as string: " . $magic . "\n";
echo "Accessing unset property: " . $magic->age . "\n";

// 18. Using stdClass in Arrays
// stdClass objects can be elements of arrays.
$objectArray = [
    new stdClass(),
    new stdClass()
];
$objectArray[0]->type = "first";
$objectArray[1]->type = "second";
echo "First object type: " . $objectArray[0]->type . "\n";

// 19. stdClass and var_dump/var_export
// Useful for debugging.
var_dump($person);
var_export($person);

// 20. Limitations and Best Practices
/*
 * Limitations:
 * - stdClass has no methods by default.
 * - Properties are public and have no type restrictions.
 * - Not suitable for complex object-oriented design.
 * - Performance might be slightly worse than typed objects.
 *
 * Best Practices:
 * - Use stdClass for simple, dynamic data structures.
 * - Prefer custom classes for complex logic or type safety.
 * - Use stdClass when working with JSON APIs.
 * - Avoid overusing dynamic properties; consider arrays for simple key-value pairs.
 * - Use isset() before accessing properties to avoid notices.
 */

// Example: Building a simple data structure
function createUser(string $name, int $age): stdClass {
    $user = new stdClass();
    $user->name = $name;
    $user->age = $age;
    $user->createdAt = date('Y-m-d H:i:s');
    return $user;
}

$user = createUser("Test User", 25);
echo "Created user: " . json_encode($user) . "\n";

?>

/*===========================================*/

