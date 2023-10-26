<?php

$array = [32, 43, 543, 23, 53];

print_r($array);

unset($array[2]);

print_r($array);

$normalized_after_delete = array_values($array);
print_r($normalized_after_delete);