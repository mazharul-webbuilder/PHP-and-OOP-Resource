<?php

class Rectangle extends Shape
{
    private int | float $length;
    private int | float $width;

    public function __construct(int|float $length, int|float $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    public function calculateArea():int|float
    {
        return $this->length * $this->width;
    }
}