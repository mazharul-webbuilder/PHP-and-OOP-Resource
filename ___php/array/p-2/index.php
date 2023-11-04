<?php

$colors = ['white', 'green', 'red'];

foreach ($colors as $key => $value) {
    echo $value . ',';
}

echo PHP_EOL;

$sorted_array = '<ul>';

foreach ($colors as $color) {
    $sorted_array .= '<li>'.$color.'</li>';
}

$sorted_array .= '</ul>';

echo $sorted_array;