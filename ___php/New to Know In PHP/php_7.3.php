<?php

// 🚀 PHP 7.3 (Released: December 6, 2018)

// Key Features:

// 1) Flexible Heredoc and Nowdoc Syntax
//    * Now supports trailing spaces and newlines in heredoc and nowdoc syntax.
$heredoc = <<<EOD
    Hello, this is a heredoc.
    It can have new lines.
EOD;

echo $heredoc;  // Outputs the string with newlines

$nowdoc = <<<'EOD'
    This is a nowdoc.
    It is similar to heredoc, but no variables can be parsed.
EOD;

echo $nowdoc;  // Outputs the string with no variable parsing



// 2) Array Destructuring with References
//    * You can now destructure arrays with references.
$array = [1, 2, 3];
[$a, &$b] = $array;
$b = 4;

echo $a;  // Outputs: 1
echo $b;  // Outputs: 4 (because it was passed by reference)



// 3) Improved `count()` Function with Objects
//    * The `count()` function can now be called on objects that implement the `Countable` interface even if they don't implement `__count()`.
class MyCountable implements Countable {
    private $data = [1, 2, 3];

    public function count() {
        return count($this->data);
    }
}

$obj = new MyCountable();
echo count($obj);  // Outputs: 3



// 4) `json_encode()` Allows `JSON_UNESCAPED_LINE_TERMINATORS` Option
//    * You can now avoid escaping line terminators with the `JSON_UNESCAPED_LINE_TERMINATORS` option.
$data = ["name" => "Alice\nBob"];
echo json_encode($data, JSON_UNESCAPED_LINE_TERMINATORS);  // Outputs: {"name":"Alice\nBob"}



// 5) `is_countable()` Function
//    * PHP 7.3 introduced `is_countable()` to check if a variable is countable (i.e., an array or an object implementing Countable).
$var = [1, 2, 3];
if (is_countable($var)) {
    echo count($var);  // Outputs: 3
}



// 6) Deprecation of `create_function()`
//    * The `create_function()` function is deprecated and should no longer be used. It was often used to create anonymous functions, but it is not recommended due to security and performance concerns.
echo 'create_function() is deprecated in PHP 7.3 and should not be used anymore.';



// 7) `filter_var()` for `FILTER_VALIDATE_URL` now validates URLs with no query strings
//    * The `FILTER_VALIDATE_URL` now properly handles URLs with no query strings.
$url = "https://www.example.com";
if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo "Valid URL: $url";  // Outputs: Valid URL: https://www.example.com
}



// 8) `get_magic_quotes_*()` Removed
//    * The deprecated `get_magic_quotes_gpc()` and related functions were completely removed in PHP 7.3.
echo 'Magic quotes were removed in PHP 7.3, so don\'t use them anymore.';



// 9) `strcasecmp()` and `strncasecmp()` Support for Multibyte Characters
//    * Both functions now support multibyte characters.
$str1 = 'abc';
$str2 = 'ABC';

echo strcasecmp($str1, $str2);  // Outputs: 0 (case-insensitive comparison)



// 10) `PDO::ATTR_EMULATE_PREPARES` Attribute Defaulting to `false`
//    * The default value of the `PDO::ATTR_EMULATE_PREPARES` attribute has been changed to `false` for more security.
try {
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'user', 'password');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    echo "PDO::ATTR_EMULATE_PREPARES set to false";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



// 11) `argon2id` Support for Password Hashing
//    * PHP 7.3 adds support for `argon2id` to `password_hash()`.
echo password_hash('password123', PASSWORD_ARGON2ID);  // Hashes with Argon2id



// 12) `split()` Deprecated
//    * The `split()` function was deprecated and is no longer available in PHP 7.3.
echo 'split() is deprecated in PHP 7.3, use preg_split() instead.';

?>
