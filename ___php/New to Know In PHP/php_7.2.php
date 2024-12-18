<?php

//🚀 PHP 7.2 (Released: November 30, 2017)

//Key Features:

//1) Object Type Hinting
    //* Type hint for object.
function setObject(object $obj)
{
    return get_class($obj);
}

echo setObject(new stdClass()); // Outputs: stdClass



//2) Argon2 Password Hashing
    //* Better password hashing algorithm.
echo password_hash('password123', PASSWORD_ARGON2I);


//3) Trailing Commas in Function Calls
    //* Allows trailing commas.
var_dump([
    'first',
    'second',
    'third',
]);
