<?php

// Write a recursive function to flatten a nested array. Any depth.
// php// Input:
// $arr = [1, [2, 3], [4, [5, [6, 7]]], 8];

// // Output:
// [1, 2, 3, 4, 5, 6, 7, 8]
// Rules:

// Must be recursive — no built-in flatten
// Handle any depth
// Last session you marked this as a weakness — fix it today


function flatten($arr){
    $flatten = [];
    foreach($arr as $item){
        if(is_array($item)){
            $flatten = array_merge($flatten, flatten($item));
        }else {
            $flatten[] = $item;
        }
    }

    return $flatten;
}

print_r(flatten([1, [2, 3], [4, [5, [6, 7]]], 8]));