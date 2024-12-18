<?php

//🚀PHP 8.2 (Released: December 8, 2022)

//Key Features:

//1) Readonly Classes
    //* Entire classes as readonly.
readonly class User {
    public function __construct(public string $name) {}
}
