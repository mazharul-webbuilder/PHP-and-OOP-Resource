<?php

// 🚀 PHP 2.x Series (Released: 1997-1998)

// Key Features:

// 1) **PHP/FI (Forms Interpreter)**
//    * PHP 2.x was initially known as PHP/FI (Forms Interpreter), designed to handle form processing and provide basic scripting capabilities for web development.
//    * The main focus was on creating dynamic web pages using HTML forms and server-side processing.
echo "PHP 2.x began as PHP/FI, designed to process forms and enable basic dynamic web page creation.";

// 2) **Server-Side Scripting**
//    * PHP 2 introduced server-side scripting capabilities, allowing developers to embed code within HTML to create dynamic content.
//    * A simple script example that mixes HTML and PHP to process form data:
?>
<form method="POST" action="process.php">
    <input type="text" name="username" placeholder="Enter your username">
    <input type="submit" value="Submit">
</form>
<?php
// 3) **Database Integration (MySQL)**
//    * PHP 2.x added support for interacting with MySQL databases, allowing the creation of dynamic, data-driven websites.
$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('test', $connection);
$query = mysql_query('SELECT * FROM users');
while ($row = mysql_fetch_array($query)) {
    echo $row['username'];  // Outputs usernames from the users table
}

// 4) **Introduction of Basic Variables and Arrays**
//    * PHP 2.x introduced the concept of variables and basic arrays for storing and manipulating data.
//    * Developers could use simple variables and arrays to store user input or database results.
$users = array("Alice", "Bob", "Charlie");
foreach ($users as $user) {
    echo $user . "<br>";  // Outputs: Alice, Bob, Charlie
}

// 5) **Minimal Functionality**
//    * PHP 2.x had limited built-in functions compared to later versions, but it introduced functions like `mysql_query()` for database interaction and basic string functions.
$query = mysql_query('SELECT * FROM users WHERE name="Alice"');
$row = mysql_fetch_assoc($query);
echo $row['email'];  // Outputs the email of the user named "Alice"

// 6) **File Handling**
//    * PHP 2.x allowed file manipulation, including reading from and writing to files.
$file = fopen("testfile.txt", "w");
fwrite($file, "Hello, PHP 2.x!");
fclose($file);

// 7) **Basic Looping and Conditional Statements**
//    * PHP 2.x supported basic control structures like loops (e.g., `for`, `while`) and conditional statements (e.g., `if`, `else`).
$number = 5;
if ($number > 3) {
    echo "Number is greater than 3.";  // Outputs: Number is greater than 3.
} else {
    echo "Number is less than or equal to 3.";
}

// 8) **Embedding Code Within HTML**
//    * PHP 2.x allowed for embedding PHP code inside HTML, making it easy to create dynamic websites without needing external scripts.
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP 2.x Example</title>
</head>
<body>
<h1>Welcome to my website</h1>
<p>
    Today's date is: <?php echo date("Y-m-d"); ?>
</p>
</body>
</html>

// 9) **Session Management (Basic Support)**
//    * PHP 2.x introduced very rudimentary session management capabilities. Though basic, it laid the foundation for later session handling improvements in future versions.
session_start();
$_SESSION['username'] = 'Alice';
echo $_SESSION['username'];  // Outputs: Alice

// 10) **Limited Error Handling**
//    * Error handling was minimal, and PHP 2.x lacked advanced exception handling features introduced in later versions.
if (!mysql_connect('localhost', 'root', '')) {
die("Could not connect to MySQL database.");  // Simple error handling
}

// 11) **Limited Object-Oriented Programming (OOP)**
//    * PHP 2.x had some object-oriented programming capabilities, but it was limited and not as fully featured as later versions.
//    * Object-oriented features became a major focus of PHP starting with PHP 3 and onward.
class User {
public $name;
public function __construct($name) {
$this->name = $name;
}
}

$user = new User("Alice");
echo $user->name;  // Outputs: Alice

// 12) **Early Templating Systems (PHP 2.x)**
//    * PHP 2.x allowed for rudimentary templating, enabling developers to create reusable templates with dynamic content.
$template = "<h1>Hello, <?php echo \$user_name; ?></h1>";
$user_name = "Alice";
eval("?>$template");  // Outputs: Hello, Alice

// 13) **Simplified Syntax for Dynamic Pages**
//    * PHP 2.x simplified the creation of dynamic web pages, and many early PHP applications were built using the combination of HTML and PHP with limited functionality.
?>
<html>
<body>
<p>Welcome, <?php echo "User"; ?>!</p>
</body>
</html>

// 🚀 PHP 2.0 to PHP 2.2 (1997-1998)

// Key Features of PHP 2.x Series:
1. **PHP/FI (Forms Interpreter)** - The initial release was primarily focused on form processing and server-side scripting for dynamic web pages.
2. **Database Interaction (MySQL)** - Introduced support for connecting to MySQL databases, making it the first step towards creating data-driven websites.
3. **Embedding PHP in HTML** - PHP 2.x allowed developers to embed PHP code within HTML, providing flexibility to build dynamic content on the fly.
4. **Basic File Handling** - PHP 2.x included file handling capabilities to read and write data to files.
5. **Control Structures and Functions** - Introduced basic programming structures like loops, conditionals, and functions to PHP, enabling more complex web applications.

// 🚀 PHP 2.2 Series - Key Changes:
1. **Introduced More Database Support** - Expanded support for other databases and refined its handling of MySQL interactions.
2. **Basic Session Support** - Early introduction of session handling features for maintaining state across pages.
3. **Object-Oriented Features (Basic)** - Object-oriented capabilities were limited but paved the way for future OOP features in PHP.

?>
