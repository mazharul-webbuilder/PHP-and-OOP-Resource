<?php

//🚀 PHP 8.1 (Released: November 25, 2021)

//Key Features:

//1) Enums
    //* Create enumerations.
enum Status {
    case ACTIVE;
    case INACTIVE;
}

$status = Status::ACTIVE;
echo $status->name; // Outputs: ACTIVE


//2) Readonly Properties
    //* Properties can only be set once.
class User {
    public readonly string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }
}
