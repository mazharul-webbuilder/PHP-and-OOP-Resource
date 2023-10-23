<?php
spl_autoload_register(function ($className){
   require_once("$className.php");
});


$client1  = new BankAccount('Ac25693585');
$client1->depositMoney(100);
$client1->withdrawMoney(50);
$client1->withdrawMoney(50);
$client1->withdrawMoney(50);
echo "Your New Balance is " . $client1->depositMoney(5000) . PHP_EOL;