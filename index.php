<?php

require __DIR__ . "/Bank.php";

$user = new Bank(123, 'Mazharul');
$user->setBalance(50);
$user->depositeAmount(100);
$user->deductAmount(20);
echo $user->getBalance();
