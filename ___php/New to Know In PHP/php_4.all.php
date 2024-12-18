<?php

// 🚀 PHP 4.0 (Released: May 22, 2000)

// Key Features:

// 1) **Introduction of Zend Engine 1.0**
//    * PHP 4 introduced the Zend Engine 1.0, which significantly improved the performance of PHP and allowed for better memory management.
echo "Zend Engine 1.0 introduced with PHP 4";

// 2) **Support for Object-Oriented Programming (OOP)**
//    * PHP 4 introduced object-oriented programming features, but it lacked the full OOP support available in later versions (such as PHP 5).
class User
{
    var $name;

    function __construct($name) {
        $this->name = $name;
    }

    function greet() {
        echo "Hello, " . $this->name;
    }
}

$user = new User("Alice");
$user->greet();  // Outputs: Hello, Alice



// 3) **Improved Session Management**
//    * PHP 4 improved session management, allowing better handling of session data and cookies.
session_start();
$_SESSION['user'] = 'Alice';
echo $_SESSION['user'];  // Outputs: Alice



// 4) **Introduction of Superglobals**
//    * PHP 4 introduced superglobal arrays like `$_GET`, `$_POST`, `$_SESSION`, and `$_COOKIE` to make variable access more convenient.
$_GET['name'] = 'John';
echo $_GET['name'];  // Outputs: John



// 5) **Improved File Handling Functions**
//    * PHP 4 introduced new file handling functions, allowing more flexible file manipulations, including `file_get_contents()`.
$file_content = file_get_contents('sample.txt');
echo $file_content;  // Outputs content of sample.txt file



// 6) **Improved XML Support with Expat**
//    * PHP 4.0 introduced support for parsing XML using the Expat XML parser.
$xml = "<?xml version='1.0' encoding='UTF-8' ?><root><name>PHP</name></root>";
$xml_parser = xml_parser_create();
xml_parse_into_struct($xml_parser, $xml, $values);
xml_parser_free($xml_parser);

echo $values[1]['value'];  // Outputs: PHP



// 🚀 PHP 4.1 (Released: December 10, 2001)

// Key Features:

// 1) **Support for the Session Extension**
//    * PHP 4.1 improved session handling by adding support for session handling through a file-based and database-backed approach.
session_start();
$_SESSION['username'] = "John";
echo $_SESSION['username'];  // Outputs: John



// 🚀 PHP 4.2 (Released: April 22, 2002)

// Key Features:

// 1) **Error Handling**
//    * PHP 4.2 improved error handling, introducing better logging and debugging tools.
error_reporting(E_ALL); // Displays all errors
echo $undefined_variable;  // Warning: Undefined variable



// 🚀 PHP 4.3 (Released: December 27, 2002)

// Key Features:

// 1) **Improved MySQL Functions**
//    * PHP 4.3 included improvements to the MySQL extension, adding support for prepared statements and more efficient queries.
$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('test', $connection);
$result = mysql_query('SELECT * FROM users');
while ($row = mysql_fetch_assoc($result)) {
    echo $row['name'];  // Outputs: user names from the 'users' table
}


// 🚀 PHP 4.4 (Released: July 11, 2005)

// Key Features:

// 1) **Improved Performance and Bug Fixes**
//    * PHP 4.4 was mostly a bug-fix release, addressing performance issues and various minor bug fixes.
echo "PHP 4.4 released with improved performance";



// 🚀 PHP 4.5 (Released: September 2005)

// Key Features:

// 1) **Final Release for PHP 4 Series**
//    * PHP 4.5 was the last release in the PHP 4.x series, and support for it ended shortly after its release. It mostly focused on bug fixes and improvements.
echo "PHP 4.5 was the last release before PHP 5";

?>
