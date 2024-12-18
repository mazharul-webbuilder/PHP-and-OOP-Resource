<?php

// 🚀 PHP 1.x Series (Released: 1995)

// Key Features:

// 1) **PHP/FI (Personal Home Page / Forms Interpreter)**
//    * PHP 1.x was initially named "Personal Home Page" and was used to handle forms and create dynamic web pages. It was designed by Rasmus Lerdorf to track visitors to his online resume.
echo "PHP 1.x, initially PHP/FI, was focused on form processing and dynamic web content generation.";

// 2) **Basic Scripting for Web Development**
//    * PHP 1.x allowed developers to write server-side scripts to process data submitted through HTML forms.
?>
<form method="POST" action="submit.php">
    <input type="text" name="username" placeholder="Enter your username">
    <input type="submit" value="Submit">
</form>
<?php
// The PHP code would handle the form submission and process the data on the server side.

// 3) **Limited Database Interaction**
//    * Early versions of PHP had minimal database interaction, with the possibility of interacting with flat files (text files) for data storage.
//    * No native support for databases like MySQL (this came later), but developers used external database scripts.
$file = fopen("user_data.txt", "w");
fwrite($file, "Username: Alice\nPassword: secret");
fclose($file);

// 4) **Embedding PHP Code in HTML**
//    * PHP 1.x allowed embedding of PHP code within HTML documents, which allowed dynamic page generation.
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP 1.x Example</title>
</head>
<body>
<h1>Welcome to my website</h1>
<p>Today's date is: <?php echo date("Y-m-d"); ?></p>
</body>
</html>

// 5) **No Advanced Functions**
//    * PHP 1.x had limited functionality compared to later versions, but allowed developers to output dynamic content using basic commands and form handling.
echo "Welcome to my website";

// 6) **No Support for Advanced Features**
//    * Features like object-oriented programming, sessions, cookies, and database interactions were either non-existent or very basic in PHP 1.x.
session_start();  // PHP 1.x did not natively support sessions.
$_SESSION['username'] = "Alice";
echo $_SESSION['username'];  // PHP 1.x lacked full session management support.

// 7) **Very Simple Variable Handling**
//    * PHP 1.x allowed the creation of variables, but the language was extremely simple and lacked many of the features that are now common in modern programming languages.
$username = "Alice";
echo "Welcome, " . $username;  // Outputs: Welcome, Alice

// 8) **Limited File Handling**
//    * File handling was available but primitive. PHP 1.x allowed reading from and writing to text files for basic data manipulation.
$file = fopen("message.txt", "r");
echo fread($file, filesize("message.txt"));
fclose($file);

// 🚀 PHP 1.x Features Summary:
// Key features of PHP 1.x included:
1. **PHP/FI (Forms Interpreter)** - The first version of PHP focused on forms and simple scripting capabilities.
2. **Basic Server-Side Scripting** - Developers could use PHP to create dynamic content by processing forms.
3. **Limited Database Interaction** - Only basic file handling capabilities, with no support for databases like MySQL.
4. **No Object-Oriented Programming (OOP)** - PHP 1.x did not have full object-oriented capabilities.
5. **Embedded PHP in HTML** - Developers could mix PHP code directly with HTML, which was revolutionary at the time.
6. **Very Limited Functions** - PHP 1.x provided only basic functions for dynamic web page creation.

?>
