<?php
/**
 * PHP provides a range of functions for working with JSON data.
 * Here's a list of some commonly used JSON-related functions in PHP:
*/

/*-----------------------------------------------------------------------------*/
//Encoding and Decoding:
/*-----------------------------------------------------------------------------*/

/**
 * $data: This is the PHP data structure (e.g., array, object) that you want to encode as a JSON string.
 * $options (optional): This parameter allows you to specify various options for encoding. It's an integer that can be a combination of different JSON encoding options. Some commonly used options include:
 * JSON_PRETTY_PRINT: Adds whitespace for better human readability.
 * JSON_NUMERIC_CHECK: Converts numeric strings to numbers.
 * JSON_UNESCAPED_SLASHES: Disables escaping slashes (/).
 * JSON_UNESCAPED_UNICODE: Doesn't escape Unicode characters.
 * $depth (optional): This parameter specifies the maximum depth to which you want to recursively encode nested structures. The default value is 512.
*/

$person = [
        'name' => 'John Doe',
    'age' => 26,
    'is_student' => true
];

$person_encoded =  json_encode($person, $options = 0, $depth = 512);
echo json_encode($person, $options = 0, $depth = 512); // Encodes a PHP value as a JSON string.

//OUTPUT: {"name":"John Doe","age":26,"is_student":true}


/*-----------------------------------------------------------------------------*/

//json_decode($json, $assoc = false, $depth = 512, $options = 0): Decodes a JSON string into a PHP variable. If $assoc is set to true, it returns an associative array; otherwise, it returns an object.

/**
 * $jsonString: This is the JSON string that you want to decode into a PHP data structure.
 * $assoc (optional): If you set this parameter to true, the function will return an associative array instead of an object for JSON objects.
 * If you set it to false (the default), it will return objects for JSON objects.
 * $depth (optional): This parameter specifies the maximum depth to which you want to recursively decode nested structures.
 * The default value is 512.
 * $options (optional): This parameter allows you to specify options for decoding. Some commonly used options include:
 * JSON_BIGINT_AS_STRING: Decodes large integers as strings to prevent integer overflow issues.
*/

$decode_person = json_decode($person_encoded);

print_r($decode_person);

// OOutput:
//(
//[name] => John Doe
//[age] => 26
//[is_student] => 1
//)


/*-----------------------------------------------------------------------------*/

//json_last_error(): Returns the last JSON parsing error code.


/**
 * In PHP, the json_last_error function is used to retrieve the last error that occurred during a JSON encoding or decoding operation using json_encode or json_decode. It returns an error code that can help you identify and handle errors related to JSON operations.
 * The json_last_error function has no parameters, and you can use it after calling json_encode or json_decode to check for any errors that might have occurred during these operations.\
 *
 * Here are some common error codes that json_last_error can return:
 *
 * JSON_ERROR_NONE (0): No error occurred.
 * JSON_ERROR_DEPTH (1): The maximum stack depth was exceeded.
 * JSON_ERROR_STATE_MISMATCH (2): Invalid or malformed JSON.
 * JSON_ERROR_CTRL_CHAR (3): Control character error, possibly due to an improperly encoded JSON string.
 * JSON_ERROR_SYNTAX (4): Syntax error in the JSON string.
 * JSON_ERROR_UTF8 (5): Malformed UTF-8 characters, possibly due to invalid Unicode sequences in the JSON string.
 * JSON_ERROR_RECURSION (6): Recursion detected in the JSON data.
 * JSON_ERROR_INF_OR_NAN (7): Inf or NaN values in the JSON string are not allowed.
 * JSON_ERROR_UNSUPPORTED_TYPE (8): A value of an unsupported type was found in the JSON string.
*/

$jsonString = '{"name":"John Doe","age":30,"is_student":false}';
$data = json_decode($jsonString);

if (json_last_error() === JSON_ERROR_NONE) {
    // JSON decoding was successful
    var_dump($data);
} else {
    // Handle the error
    echo "JSON decoding error: " . json_last_error_msg(); //json_last_error_msg(): Returns the last JSON parsing error message.
}

/*-----------------------------------------------------------------------------*/


//Error Handling:
//
//json_last_error(): Returns the last JSON error that occurred.
//json_last_error_msg(): Returns the last JSON error message.
//Pretty-Printing:
//
//json_encode($value, JSON_PRETTY_PRINT): Encodes a PHP value as a JSON string with human-readable formatting.
//json_encode($value, JSON_UNESCAPED_SLASHES): Encodes a PHP value as a JSON string without escaping forward slashes.
//json_encode($value, JSON_UNESCAPED_UNICODE): Encodes a PHP value as a JSON string without escaping Unicode characters.
//json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT): Combines multiple flags for custom encoding.
//JSON File Handling:
//
//file_get_contents($filename): Reads the contents of a JSON file into a string.
//file_put_contents($filename, $data): Writes a JSON string to a file.
//json_encode($value, JSON_PRETTY_PRINT) and file_put_contents($filename, json_encode($value, JSON_PRETTY_PRINT)): Writes a prettified JSON string to a file.
//These functions enable you to work with JSON data in PHP by encoding, decoding, and handling JSON strings and files. Make sure to refer to the official PHP documentation for detailed information on these functions and any new additions or changes in the PHP version you're using.