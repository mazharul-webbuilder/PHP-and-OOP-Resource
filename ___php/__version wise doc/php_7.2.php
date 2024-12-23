<?php

// 🚀 PHP 7.2 (Released: November 30, 2017)

// Key Features:

// 1) Object Type Hinting
//    * Type hint for object.
function setObject(object $obj): string
{
    return get_class($obj);
}

echo setObject(new stdClass()); // Outputs: stdClass



// 2) Argon2 Password Hashing
//    * Better password hashing algorithm.
echo password_hash('password123', PASSWORD_ARGON2I); // Uses Argon2i for hashing



// 3) Trailing Commas in Function Calls
//    * Allows trailing commas in function and method calls.
var_dump([
    'first',
    'second',
    'third',  // Trailing comma is allowed here
]);



// 4) New PHP Internal Functions
//    * PHP 7.2 added several new functions to improve the language.
echo implode(' ', array_map('strtoupper', ['hello', 'world']));  // Outputs: HELLO WORLD



// 5) Type Error for Invalid Argument Count in Functions
//    * Throws a TypeError if the wrong number of arguments is passed to a function.
function foo($arg1, $arg2)
{
    return $arg1 + $arg2;
}

try {
    echo foo(1);  // Missing second argument
} catch (TypeError $e) {
    echo 'Error: ' . $e->getMessage();  // Outputs: Error: Too few arguments to function foo()
}



// 6) Support for Unpacking Inside Array Expressions
//    * Allows unpacking of arrays inside array expressions using the spread operator.
$array1 = [1, 2];
$array2 = [3, 4];
$array3 = [...$array1, ...$array2];
var_dump($array3);  // Outputs: array(4) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(4) }



// 7) Improved FFI (Foreign Function Interface)
//    * The Foreign Function Interface allows PHP to interact with C libraries directly.
$ffi = FFI::cdef('int sum(int, int);', 'libm.so');
echo $ffi->sum(2, 3); // Calling a C function sum via FFI



// 8) Deprecating `mysql` Extension
//    * The deprecated `mysql_*` functions were removed and developers are encouraged to use `mysqli_*` or `PDO`.
//    * For example, using `mysqli` instead of `mysql`:
$mysqli = new mysqli("localhost", "user", "password", "database");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// 9) Fixed Argument Unpacking in call_user_func() and call_user_func_array()
//    * PHP 7.2 allows the argument unpacking to work in `call_user_func()` and `call_user_func_array()`.
$func = function($arg1, $arg2) {
    return $arg1 + $arg2;
};

$args = [1, 2];
echo call_user_func_array($func, $args);  // Outputs: 3



// 10) `is_countable()` function
//    * The `is_countable()` function checks if a variable is countable (i.e., an array or an object implementing Countable).
$var = [1, 2, 3];
if (is_countable($var)) {
    echo count($var);  // Outputs: 3
}



// 11) `Sodium` Extension for Cryptography
//    * PHP 7.2 added the Sodium extension, which provides cryptographic functions.
$secret = 'my_secret_key';
$message = 'Hello, World!';
$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);

$encrypted = sodium_crypto_secretbox($message, $nonce, $secret);
echo sodium_crypto_secretbox_open($encrypted, $nonce, $secret);  // Decrypt the message



// 12) `data` and `int` types in type declarations
//    * The `data` type was introduced for type hints in some specific cases.
//    * PHP 7.2 improves type hints and adds support for new types.
function processData(int $data)
{
    return $data * 2;
}

echo processData(5);  // Outputs: 10



// 13) `count()` can be called on objects that implement `Countable`
//    * PHP 7.2 extends support for calling `count()` on objects that implement `Countable` interface.
class MyClass implements Countable
{
    private $items = ['apple', 'banana'];

    public function count() {
        return count($this->items);
    }
}

$obj = new MyClass();
echo count($obj);  // Outputs: 2



// 14) `hex2bin()` function updates
//    * Improved `hex2bin()` to handle invalid characters.
echo bin2hex(hex2bin('68656c6c6f'));  // Outputs: 68656c6c6f

?>
