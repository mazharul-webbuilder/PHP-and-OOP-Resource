<?php

require __DIR__ . "/Bank.php";
require __DIR__ . "/File.php";

//$user = new Bank(123, 'Mazharul');
//$user->setBalance(50);
//$user->depositeAmount(100);
//$user->deductAmount(20);
//echo $user->getBalance();

$file = new File();
$file->displayContent(__DIR__. '/test.txt');

$file_content = $file->getContent(__DIR__. '/test.txt');
echo $file_content;

