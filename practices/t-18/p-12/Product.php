<?php

class Product implements Comparable
{
    private string $name;
    private int|float $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getPrice(): int|float
    {
        return $this->price;
    }

    /**
     * @throws Exception
     */
    public function compareTo($other): mixed
    {
        if ($other instanceof Product) {
            if ($this->price < $other->getPrice()) {
                return -1;
            } elseif ($this->price > $other->getPrice()) {
                return 1;
            } else {
                return 0;
            }
        } else {
            throw new Exception("Invalid comparison object");
        }
    }
}