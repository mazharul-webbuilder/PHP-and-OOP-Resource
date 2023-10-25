<?php

class ShoppingCart
{
    protected array $items;
    public function __construct()
    {
        $this->items = [];
    }

    public function addToCart(int $qty, float $price): void
    {
        $this->items[$qty] = $price;
    }

    public function getTotalCost(): float
    {
        $total = 0;
        foreach ($this->items as $qty => $price) {
            $total  += ($qty * $price);
        }
        return $total;
    }


}