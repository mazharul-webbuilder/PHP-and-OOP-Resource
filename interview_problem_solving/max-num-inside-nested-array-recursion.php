<?php

// Write a recursive function to find the maximum number inside a nested array of any depth.

// // Input:
// $arr = [1, [2, 30], [4, [5, [6, 7]]], 8];

// // Output:
// 30

// Another example:

// // Input:
// $arr = [[-10, -20], [-5, [-40]], -1];

// // Output:
// -1
// Rules
// Must be recursive
// No max() on the entire flattened result
// No flattening first
// Handle any depth
// Return the largest numeric value


function maxNumberInsideNestedArrayRecursive($nums)
{
    $max = null;

    foreach ($nums as $item) {
        if (is_array($item)) {
            $childMax = maxNumberInsideNestedArrayRecursive($item);
            $max = ($max === null) ? $childMax : max($max, $childMax);
        } else {
            $max = ($max === null) ? $item : max($max, $item);
        }
    }

    return $max;
}

echo maxNumberInsideNestedArrayRecursive([5, [10, [20]]]);


