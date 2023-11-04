<?php

/**
 * PHP provides a comprehensive set of file management functions to work with files and directories.
 * Here is a list of commonly used file management functions in PHP:
*/

/*----------------------------------------------------------------------------------*/

// Get list of file in a directory

$directory = scandir(__DIR__);


print_r($directory);

//OUTPUT
//Array
//(
//    [0] => .                                   // . mean current directory
//    [1] => ..                                  // .. mean parent directory
//    [2] => file_chat_sheet.php                 // file that found in a directory
//)



/*----------------------------------------------------------------------------------*/

// mkdir() use to make new directory into current folder

//mkdir('foo'); // This will create new directory into the current  directory


/*----------------------------------------------------------------------------------*/


/*----------------------------------------------------------------------------------*/

// rmdir() use to make remove/delete a directory into current folder

//Rule: Directory must be  empty

//rmdir('foo'); // This will delete foo directory from the current  directory

/*----------------------------------------------------------------------------------*/

// file_exists() use to check is the file exist

if (file_exists('example.txt')) {
    echo 'found';
}  else {
    echo 'Not found';
}

/*----------------------------------------------------------------------------------*/


// file_size() use to check the file size

if (file_exists('example.txt')) {
    echo filesize('example.txt');
}

/*----------------------------------------------------------------------------------*/

// file_put_contents() use to write on a file

//Example

if (file_exists('example.txt')) {
    file_put_contents('example.txt', 'Hello World');
}

clearstatcache(); // clear file cache

/*----------------------------------------------------------------------------------*/


/*----------------------------------------------------------------------------------*/

// file_get_contents() use to get file content

//Example

if (file_exists('example.txt')) {
    $file_data = file_get_contents('example.txt'); // output will be a string
}

/*----------------------------------------------------------------------------------*/















//File Operations:
//
//fopen($filename, $mode, $use_include_path = false, $context = null): Opens a file or URL.
//fclose($handle): Closes an open file pointer.
//fwrite($handle, $string, $length = null): Writes to an open file.
//fread($handle, $length): Reads a file up to a specified number of bytes.
//fgets($handle, $length): Reads a line from an open file.
//fgetcsv($handle, $length = 0, $delimiter = ",", $enclosure = '"', $escape = "\\"): Parses a line from an open file as CSV.
//feof($handle): Tests for end-of-file on an open file pointer.
//rename($oldname, $newname, $context = null): Renames a file or directory.
//copy($source, $dest, $context = null): Copies a file.
//unlink($filename, $context = null): Deletes a file.
//is_file($filename): Checks if a path is a regular file.
//is_dir($filename): Checks if a path is a directory.
//file_exists($filename): Checks whether a file or directory exists.
//file($filename, $flags = 0, $context = null): Reads an entire file into an array.
//filemtime($filename): Gets the last modification time of a file.
//filesize($filename): Gets the file size.
//filetype($filename): Gets the file type.
//pathinfo($path, $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME): Returns information about a file path.
//realpath($path): Returns the real path of a file or directory.
//chmod($filename, $mode): Changes file mode (permissions).
//chown($filename, $user): Changes file owner.
//chgrp($filename, $group): Changes file group.
//fileatime($filename): Gets the last access time of a file.
//glob($pattern, $flags = 0): Finds pathnames matching a pattern.
//Directory Operations:
//
//opendir($path, $context = null): Opens a directory handle.
//readdir($dir_handle): Reads entry from directory handle.
//rewinddir($dir_handle): Rewinds directory handle.
//closedir($dir_handle): Closes directory handle.
//chdir($directory): Changes the current directory.
//getcwd(): Gets the current working directory.
//These file and directory management functions in PHP allow you to perform various operations, such as reading, writing, copying, deleting files, and working with directories. Be sure to refer to the official PHP documentation for detailed information on these functions and any new additions or changes in the PHP version you're using.
//
//
//
//
