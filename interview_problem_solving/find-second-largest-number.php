<?php

// Given an array of numbers, return the second largest number. If it doesn't exist, return null.
// php// Examples:
// secondLargest([1, 5, 3, 9, 7])   // 7
// secondLargest([5, 5, 5])          // null  — all same, no second largest
// secondLargest([3])                // null  — only one element
// Rules:

// No sort() or rsort() — solve it manually
// Single loop only
// Handle duplicates correctly

// Write your PHP function.

function secondLargest($nums){
    if(count($nums) < 2){
        return null;
    }
    $hashed = [];
    foreach($nums as $num){
        $hashed[$num] = 1;
    }

    if(count($hashed) === 1) {
        return null;
    }

    // print_r($hashed);

    $largestNumber = $nums[0];
    foreach($nums as $num){
        if($num > $largestNumber){
            $largestNumber = $num;
        }
    }

    $secondLarg = $nums[0];
    foreach($nums as $num2){
        if($num2 === $largestNumber){
            continue;
        }
        if($num2 > $secondLarg){
            $secondLarg = $num2;
        }
    }

    return $secondLarg;
}

echo secondLargest([1, 5, 3, 9, 7]);

