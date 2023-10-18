<?php

class Square implements Resizable
{
    private int|float $width;
    private int|float $height;

    public function __construct($height, $width)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function resize(): int|float
    {
        return (($this->height + $this->width) / 2);
    }
}