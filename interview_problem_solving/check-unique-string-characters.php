<?php

// Given a string, check if it contains all unique characters — no character appears more than once.
// php// Examples:
// isUnique("abcdef")   // true
// isUnique("hello")    // false  — 'l' appears twice
// isUnique("abcABC")   // true   — case sensitive
// Rules:

// No built-in functions like array_unique() or count_chars()
// O(n) solution expected
// Handle empty string — return true

// Write your PHP function.

function isUnique($string){
    if(!$string){
        return true;
    }

    $splited = str_split($string);

    $splitedHash = [];

    foreach($splited as $item){
        $splitedHash[$item] = 1;
    }
    return count($splited) == count($splitedHash);
}

echo isUnique('abcABC') ? 'true' : 'false';

