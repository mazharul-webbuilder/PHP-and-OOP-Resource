<?php

// 🚀 PHP 3.0 (Released: June 6, 1998)

// Key Features:

// 1) **Introduction of PHP as a Full-Fledged Scripting Language**
//    * PHP 3.0 marked the transition from a simple tool for tracking web traffic (Personal Home Page) to a powerful server-side scripting language for web development.
echo "PHP 3.0 introduced as a full-fledged scripting language";

// 2) **Improved Syntax and Functions for Web Development**
//    * PHP 3.0 added several new functions for string manipulation, database connections, and form handling.
$text = "Hello, World!";
echo strtoupper($text);  // Outputs: HELLO, WORLD!

// 3) **Support for Multiple Databases (MySQL, PostgreSQL, ODBC)**
//    * PHP 3.0 introduced built-in support for multiple databases, including MySQL and PostgreSQL, making it easier to connect to databases in web applications.
$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('test', $connection);
$query = mysql_query('SELECT * FROM users');
echo mysql_num_rows($query);  // Outputs number of rows in the users table


// 🚀 PHP 3.1 (Released: 1999)

// Key Features:

// 1) **Improved File Handling and User Input Functions**
//    * PHP 3.1 introduced more advanced features for handling files and user input, allowing easier file uploads and data processing.
if (isset($_POST['submit'])) {
    $file = fopen($_FILES['uploaded_file']['tmp_name'], 'r');
    echo fread($file, filesize($_FILES['uploaded_file']['tmp_name']));  // Outputs content of uploaded file
}

// 2) **Introduction of Regular Expressions (PCRE)**
//    * PHP 3.1 integrated the Perl Compatible Regular Expressions (PCRE) library for more powerful and flexible string matching and manipulation.
$pattern = "/^a.*z$/";
$string = "abcxyz";
if (preg_match($pattern, $string)) {
    echo "Match found";  // Outputs: Match found
}


// 🚀 PHP 3.2 (Released: 2000)

// Key Features:

// 1) **Session Management Support**
//    * PHP 3.2 introduced basic session management, allowing developers to create stateful web applications.
session_start();
$_SESSION['user'] = 'John';
echo $_SESSION['user'];  // Outputs: John

// 2) **Image Handling and GD Library**
//    * PHP 3.2 added support for creating and manipulating images using the GD library.
$image = imagecreate(100, 100);
$background_color = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);
imagestring($image, 5, 10, 10, "PHP", $text_color);
imagepng($image, 'php_image.png');
imagedestroy($image);  // Creates and saves an image with the text 'PHP'


// 🚀 PHP 3.3 (Released: 2001)

// Key Features:

// 1) **Integration with More Databases**
//    * PHP 3.3 introduced support for additional databases, including Microsoft SQL Server (MSSQL) and others.
$connection = odbc_connect('DSN', 'user', 'password');
$query = odbc_exec($connection, "SELECT * FROM users");
while ($row = odbc_fetch_array($query)) {
    echo $row['name'];  // Outputs: User names from the database
}

// 2) **Increased Performance and Stability**
//    * PHP 3.3 focused on improving the overall performance and stability of the language.
echo "PHP 3.3 introduced significant performance and stability improvements.";

// 3) **Output Buffering**
//    * PHP 3.3 allowed developers to control the output buffering, enabling more control over when content is sent to the browser.
ob_start();
echo "This content is buffered.";
$content = ob_get_contents();
ob_end_clean();
echo $content;  // Outputs: This content is buffered.


// 🚀 PHP 3.4 (Released: Early 2001)

// Key Features:

// 1) **PHP 3.4 marked the final stable release in the PHP 3.x series**
//    * This version mostly focused on bug fixes and preparing for the upcoming PHP 4.0 release.
echo "PHP 3.4 was the final release of the PHP 3.x series.";

?>
