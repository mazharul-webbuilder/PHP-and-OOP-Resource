<?php

$array = [
    "Sophia" => "31",
    "William" => "39",
    "Ramesh" => "40",
];
asort($array); // sort by value

print_r($array);

ksort($array); // sort by key

print_r($array);

arsort($array); // sort by value descending

print_r($array);

krsort($array); // sort by key descending

print_r($array);