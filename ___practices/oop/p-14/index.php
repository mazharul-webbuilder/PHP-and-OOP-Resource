<?php

require_once "Math.php";

$math = new Math(20, 10);
$math->add();
$math->subtract();
$math->division();
$math->multiply();

$math2 = new Math(20, 50);
$math3 = new Math(15, 5);

$math->compareSub($math2);
