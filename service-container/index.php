<?php
require_once 'Feature1.php';
require_once 'Feature2.php';

$f1 = new Feature1();
echo "Feature 1: " . $f1->someMethod();

echo "<br>";

$f2 = new Feature2();
echo "Feature 2: " . $f2->someMethod();
