<?php

// Given a string, reverse each word individually but keep the word order the same.
// php// Examples:
// reverseWords("hello world")       // "olleh dlrow"
// reverseWords("Laravel is great")  // "levaraL si taerg"
// reverseWords("PHP")               // "PHP"
// Rules:

// No strrev() — reverse manually
// Keep word order, only reverse characters inside each word



function reversWords($str){
   $parsed = explode(' ', $str);

$resultString = '';
   foreach($parsed as $word){
    $splited = str_split($word);
    $wordReverse = '';
    foreach($splited as $c){
        $wordReverse = $c.$wordReverse;
    }
    $wordReverse = ' ' . $wordReverse;
    $resultString .= $wordReverse;
   }
   return $resultString;
}

echo reversWords("Laravel is great");