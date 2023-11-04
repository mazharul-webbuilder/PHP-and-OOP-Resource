<?php
class Triangle extends Shape
{
    private Int|float $height;
    private Int|float $base;

    public function setHeight($height)
    {
        $this->height = $height;
    }
    public function getHeight()
    {
       return  $this->height;
    }
    public function setBase($base)
    {
        $this->base = $base;
    }
    public function getBase()
    {
        return  $this->base;
    }

    public function calculateArea():int|float
    {
        return 0.5 * $this->base * $this->height;
    }

}