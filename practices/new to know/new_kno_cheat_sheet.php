<?php
/**
 * New features of php that should know and use in PHP
*/
//----------------------------------------------------//

//match keyword work as switch work, but little different

//Example: 1

$paymentStatus = 1;

$messasge = match ($paymentStatus){
    1 => 'Success',
    2 => 'Denied',
    default => 'Unknown' // if datatype not mathc
};

var_dump($messasge); // output: success