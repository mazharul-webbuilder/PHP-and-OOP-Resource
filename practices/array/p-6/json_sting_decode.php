<?php

$json_string = '{
        "Title": "The Cuckoos Calling",
        "Author": "Robert Galbraith",
        "Detail": {
                "Publisher": "Little Brown"
            }
        }';

$decode_as_array = (array) json_decode($json_string, true);

//print_r($decode_as_array);
//echo $decode_as_array['Detail']['Publisher'];

foreach ($decode_as_array as $key => $value) {
    if (is_array($value)) {
        foreach ($value as $k => $v) {
            echo "$k : $v" . PHP_EOL;
        }
    } else{
        echo "$key : $value" . PHP_EOL;
    }
}