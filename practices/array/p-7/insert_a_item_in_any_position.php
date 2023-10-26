<?php

$array = [56, 32, 234, 'hello', 23, true];

$inserted_item = 'new';
print_r($array);
array_splice($array, 4, 0, $inserted_item);
print_r($array);