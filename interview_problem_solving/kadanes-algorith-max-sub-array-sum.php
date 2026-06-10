<?php

// Given an array of integers, return the maximum sum of any contiguous subarray.
// php// Examples:
// maxSubarraySum([-2, 1, -3, 4, -1, 2, 1, -5, 4])  // 6 → [4, -1, 2, 1]
// maxSubarraySum([1])                                 // 1
// maxSubarraySum([-1, -2, -3])                        // -1  → best single element
// Rules:

// This is Kadane's algorithm — think about it
// O(n) single pass
// Must handle all negative arrays

function maxSubarraySum($nums){
    $current_sum = $nums[0];
    $max_sum   = $nums[0];

    for($i=1; $i<count($nums); $i++){
         # Decide whether to extend the current subarray or start fresh
        $current_sum = max($nums[$i], $current_sum + $nums[$i]);
        # Update the highest overall sum seen so far
        $max_sum = max($max_sum, $current_sum);
    }

    return $max_sum;

}

echo maxSubarraySum([-1, -2, -3]);

// Study Materials
// -----------------------------------------------------------------------------------------
// Kadane's Algorithm is an efficient,
// iterative method used to find the maximum sum of a contiguous subarray 
// within a one-dimensional array of numbers. Developed by computer scientist Jay Kadane in 1984,
// it solves the Maximum Subarray Problem in a single pass.

// It achieves an optimal O(n) time complexity and O(1) space complexity,
// outperforming naive brute-force approaches that require O(n²) or O(n³) time.

// Core Logic & Working PrincipleThe algorithm utilizes a simple dynamic programming and greedy approach.
// As it traverses the array from left to right,
// it tracks two main metrics at each element:current_sum: The maximum subarray sum ending exactly 
// at the current position.max_sum: The global maximum subarray sum encountered so far across
// the entire array.For each element, you must make a choice:Extend the existing subarray: Add the current
// element to the running current_sum.Start a fresh subarray: Reset the subarray to begin exactly at the 
// current element.If the accumulated current_sum drops below zero, it becomes a liability for future
//  elements. The algorithm then greedily discards the previous sum and resets current_sum to zero.