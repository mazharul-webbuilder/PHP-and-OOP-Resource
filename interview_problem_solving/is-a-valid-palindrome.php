<?php
// Given a string, check if it is a valid palindrome considering only alphanumeric characters and ignoring case.
// php// Examples:
// isPalindrome("A man, a plan, a canal: Panama")  // true
// isPalindrome("race a car")                       // false
// isPalindrome(" ")                                // true
// Rules:

// Remove all non-alphanumeric characters first
// Case insensitive
// Use two pointer approach

function isPalindrome($string){
    if($string === ' '){
        return true;
    }
    $formated = preg_replace('/[^a-z]/','', strtolower($string));

    $length = strlen($formated);
    $middlePoint = floor($length/ 2);

    $splited = str_split($formated);

    $leftPointer = 0;
    $rightPointer = $length-1;
    for($i=0; $i<=$middlePoint; $i++){
        if($splited[$leftPointer] === $splited[$rightPointer]){
            $leftPointer++;
            $rightPointer--;
        }else{
            return false;
        }
        
    }

    return true;

}

echo isPalindrome("A man, a plan, a canal: Panama");