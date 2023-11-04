<?php
/**
 *PHP provides a wide range of string manipulation functions.
 * Here's a list of some commonly used string manipulation functions in PHP:
 */
/*------------------------------------------------------------*/
$string = "some text";
echo strlen($string) . PHP_EOL; // Returns the length of string, It this case output is : 9
/*------------------------------------------------------------*/
$string = "Hello PHP";
$search = "PHP";
$replace = "Laravel";
$modified_string = str_replace($search, $replace, $string) . PHP_EOL; // Replaces all occurrences of a substring in a string.
echo "Modified String $string to, " . $modified_string . PHP_EOL;
/*------------------------------------------------------------*/
$string = "Hello from the Earth";
$start = 6;
$length = strlen($string);
$substring = substr($string, $start, $length); //Returns a part of a string. Output: from the Earth
echo $substring . PHP_EOL;
/*------------------------------------------------------------*/
$string = 'John';
$needle = 'h';
$character_position = strpos($string, $needle); //Finds the position of the first occurrence of a substring in a string.
echo $character_position . PHP_EOL;
/*------------------------------------------------------------*/
$string = "I am a string on string";
$needle = 'string'; // output: string on string
echo stristr($string, $needle) . PHP_EOL; //Returns a part of the string from the first occurrence of a substring to the end, case-insensitive.
/*------------------------------------------------------------*/
$string = "I am a string on string ";
$needle = 'string '; // output: string on string
echo strstr($string, $needle). PHP_EOL; //Returns a part of the string from the first occurrence of a substring to the end.
/*------------------------------------------------------------*/
echo strtolower($string) . PHP_EOL; //Converts a string to lowercase.
/*------------------------------------------------------------*/
echo strtoupper($string) . PHP_EOL;// a string to uppercase.
/*------------------------------------------------------------*/
echo ucfirst($string). PHP_EOL; // Converts the first character of a string to uppercase.
/*------------------------------------------------------------*/
echo ucwords($string). PHP_EOL; // Converts the first character of each word in a string to uppercase.
/*------------------------------------------------------------*/
$string = " removed start and end extra space by trim function     ";
echo trim($string) . PHP_EOL; //Removes whitespace or other characters from the beginning and end of a string.
/*------------------------------------------------------------*/
echo ltrim($string). PHP_EOL; // Removes whitespace or other characters from the beginning of a string.
/*------------------------------------------------------------*/
echo rtrim($string). PHP_EOL; // Removes whitespace or other characters from the end of a string.
/*------------------------------------------------------------*/
echo strrev(trim($string)) . PHP_EOL; // Reverses a string.
/*------------------------------------------------------------*/
$string = "Hello World";
$length = 20;
$padding = '.';
echo str_pad($string, $length, $padding, STR_PAD_LEFT) . PHP_EOL; // Output:  .........Hello World
echo str_pad($string, $length, $padding, STR_PAD_RIGHT) . PHP_EOL; // Output:  Hello World.........
echo str_pad($string, $length, $padding, STR_PAD_BOTH) . PHP_EOL; // Output:  .....Hello World.....
/*------------------------------------------------------------*/
$string = "Hello Php";
$multiplier = 3; // Output: Hello PhpHello PhpHello Php
echo str_repeat($string, $multiplier) . PHP_EOL; //Repeats a string a specified number of times.
/*------------------------------------------------------------*/
$string = "This is string into variable string";
$length = 4; // Output: ["This", " is ", "stri", .......]
var_dump(str_split($string, $length));  // Splits a string into an array of substrings with the given length
/*------------------------------------------------------------*/
$str1 = "I am String";
$str2 = "I am string";
if (strcasecmp($str1, $str2)) {//Binary safe case-insensitive string comparison. return 0 if both are same
    echo "Both Not Same". PHP_EOL;
} else {
    echo "Both are same" . PHP_EOL;
}
echo strcasecmp("Hello world!","HELLO WORLD!") . PHP_EOL; // The two strings are equal
echo strcasecmp("Hello world!","HELLO") . PHP_EOL; // String1 is greater than string2
echo strcasecmp("Hello world!","HELLO WORLD! HELLO!") . PHP_EOL; // String1 is less than string2
/*------------------------------------------------------------*/
$str1 = "Helloooo World";
$str2 = "Helloooo David";
echo similar_text($str1, $str2). PHP_EOL; //Calculate the similarity between two strings and return when not match output: 10
/*------------------------------------------------------------*/
print_r(str_word_count("Hello world & good morning!",1)) . PHP_EOL; // will return array
print_r(str_word_count("Hello world & good morning!",1,"&")) . PHP_EOL; //Returns information about words used in a string.
/*------------------------------------------------------------*/
$string = "Hello World";
echo str_shuffle($string). PHP_EOL; //Randomly shuffles the characters in a string.
/*------------------------------------------------------------*/
echo strcspn("Hello world!","w"). PHP_EOL; // Print the number of characters found in "Hello world!" before the character "w":
/*------------------------------------------------------------*/
$str = "Hallo wmrld";
$from = 'am';;
$to = 'eo';
echo strtr($str, $from, $to). PHP_EOL; //Translates certain characters in a string.
/*------------------------------------------------------------*/
$string = "Hello World";
$encoding = "UTF-8"; // Output: 11
echo mb_strlen($string, $encoding) . PHP_EOL; //Returns the number of characters in a string, considering multibyte characters (requires the mbstring extension).
/*------------------------------------------------------------*/
