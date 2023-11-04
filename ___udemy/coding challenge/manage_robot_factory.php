<?php

function named_robot() : string
{
    $prefix = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $take_prefix = str_shuffle($prefix)[rand(0, 25)] . str_shuffle($prefix)[rand(0,25)];

    return $take_prefix . rand(100, 999);
}

$robot = named_robot();

echo $robot . PHP_EOL;


