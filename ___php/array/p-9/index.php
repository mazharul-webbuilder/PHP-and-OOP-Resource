<?php

$month_temp = "78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 81, 76, 73,
68, 72, 73, 75, 65, 74, 63, 67, 65, 64, 68, 73, 75, 79, 73";


$temperature_array = explode(',', $month_temp,);

$length_of_array = count($temperature_array);
$total_temp = 0;

for ($i=0; $i<$length_of_array; $i++) {
    $total_temp += $temperature_array[$i];
}
echo "Average Temperature: " . $total_temp / $length_of_array;
echo PHP_EOL;

sort($temperature_array);

echo "5 Lowest Temperature: ";
foreach ($temperature_array as $key => $value) {
    if ($key == 5) {
        break;
    }
    echo $temperature_array[$key] .',';
}

echo PHP_EOL;
echo "5 Highest Temperature:";
for ($i=$length_of_array-5; $i<$length_of_array; $i++) {
    echo $temperature_array[$i] .',';
}

