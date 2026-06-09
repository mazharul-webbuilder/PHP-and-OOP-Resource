<?php

// Given an array of integers, return true if any two numbers add up to zero.
// php// Examples:
// hasZeroSum([1, -1, 3, 5])    // true  — 1 + (-1) = 0
// hasZeroSum([1, 2, 3])        // false
// hasZeroSum([-3, 0, 3, 7])    // true  — -3 + 3 = 0
// hasZeroSum([0, 1, 2])        // false — need TWO numbers, 0 alone doesn't count
// Rules:

// O(n) solution using hash map
// Two distinct elements must sum to zero
// Single loop

function hasZeroSum($nums){
    $hashed = [];
    foreach ($nums as $num){
        $hashed[$num] = $num;
    }
    
    foreach($hashed as $num){
                if(isset($hashed[-$num]) && $num !== 0){
            return true;
        }
    }
    return false;
}

echo hasZeroSum([1, -1, 3, 5]) ? 'true' : 'false';