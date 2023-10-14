<?php

class Helper
{
    public static function countVowel(string $text): void
    {
        $sortArray = [];
        for ($i=0; $i<strlen($text); $i++) {
            if (in_array($text[$i], ['a', 'e', 'i', 'o', 'u'])) {
                if (!in_array($text[$i], $sortArray)) {
                    $sortArray[] = $text[$i];
                }
            }
        }
        echo count($sortArray);
    }
}

Helper::countVowel('this is test of how many vowel used in this text');