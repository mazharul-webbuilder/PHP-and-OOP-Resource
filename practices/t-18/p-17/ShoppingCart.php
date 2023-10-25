<?php

class ShoppingCart
{
    protected array $items;
    protected float $total;
    public function __construct()
    {
        $this->items = [];
        $this->total = 0;
    }

    public function addToCart(int $qty, float $price): void
    {
        $this->items[$qty] = $price;
    }

    public function getTotalCost(): float
    {
        foreach ($this->items as $qty => $price) {
            $this->total  += ($qty * $price);
        }
        print_r($this->items);
        return $this->total;
    }


}