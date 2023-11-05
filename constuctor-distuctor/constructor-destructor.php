<?php

//-------------------------------------------------------------------------------------------------------//

/**
 * Below constructor feature will work only in PHP 8.1+
*/

//-------------------------------------------------------------------------------------------------------//


// Before 8.1
class ConstructorBefore
{
    public string $name;
    public int $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

//-------------------------------------------------------------------------------------------------------//

// After 8.1+
class ConstructorAfter
{
    /**
     * Here in parameter $name and $age will act as class property of ConstructorAfter class
     *
     * remember you must have to pass access modifier Pub, Pri, Pro, Otherwise constructor will
     * act as normal parameter
    */
    public function __construct(public string $name, public int $age)
    {

    }
}
//-------------------------------------------------------------------------------------------------------//
