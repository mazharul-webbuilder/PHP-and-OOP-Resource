<?php

require "ShoppingCart.php";

$mycart =  new ShoppingCart();
$mycart->addToCart(5, 3);
echo "Total Cost is: " . $mycart->getTotalCost() . PHP_EOL;
$mycart->addToCart(1, 10);
echo "Total Cost is: " . $mycart->getTotalCost();
