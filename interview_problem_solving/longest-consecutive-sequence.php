<?php

// Given an array of integers, find the longest consecutive sequence length.
// php// Examples:
// longestConsecutive([100, 4, 200, 1, 3, 2])  // 4 → sequence: [1,2,3,4]
// longestConsecutive([0, 3, 7, 2, 5, 8, 4, 6, 0, 1]) // 9 → [0,1,2,3,4,5,6,7,8]
// longestConsecutive([1, 1, 1]) // 1
// Rules:

// No sorting
// O(n) expected — think hash map
// Handle duplicates

function longestConsecutinveSequenceLength($nums){
    $hashed = [];
    $lowestNum = $nums[0];
    $resultCount = 1;
    foreach($nums as $num){
        $hashed[$num] = $num;

        if($num < $lowestNum) {
            $lowestNum = $num;
        }
    }

    foreach($hashed as $hash){
        if(isset($hashed[$lowestNum+1])){
            $resultCount++;
            $lowestNum++;
        }
    }
    
    return $resultCount;
}

echo longestConsecutinveSequenceLength([0, 3, 7, 2, 5, 8, 4, 6, 0, 1]);