<?php

// Given an integer array, move all zeroes to the end while maintaining the order of non-zero elements.
// php// Input:  [0, 1, 0, 3, 12]
// // Output: [1, 3, 12, 0, 0]

// // Input:  [0, 0, 1]
// // Output: [1, 0, 0]
// Rules:

// Modify in place or return new array — your choice
// Maintain relative order of non-zero elements
// Single pass preferred

// Write your PHP function.

function moveAllZeroesToEnd($nums){
    $countZeros = 0;

    foreach($nums as $i => $num){
        if($num === 0){
            $countZeros++;
            unset($nums[$i]);
        }
    }

    for($i=1; $i<=$countZeros; $i++){
        $nums[] = 0;
    }

    return $nums;

}

print_r(moveAllZeroesToEnd([0, 1, 0, 3, 12]));