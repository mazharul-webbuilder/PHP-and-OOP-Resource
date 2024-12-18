<?php

//🚀 PHP 8.3 (Released: November 2023)

//Key Features:

//1) Typed Class Constants
    //* Class constants can have types.
class User {
    public const string ROLE = 'Admin';
}

//1) json_validate
    //* Validates JSON without decoding.
if (json_validate($json)) {
    echo "Valid JSON";
}
