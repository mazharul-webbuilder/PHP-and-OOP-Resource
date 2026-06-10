<?php

function nestedArrysumRecursive($nums){
    $finalSum = 0;
    foreach($nums as $num){
        if(is_array($num)){
            $finalSum = $finalSum + nestedArrysumRecursive($num);
        }else{
            $finalSum += $num;
        }
    }

    return $finalSum;
}


echo nestedArrysumRecursive([1, [2, 3], [4, [5, [6, 7]]], 8]);