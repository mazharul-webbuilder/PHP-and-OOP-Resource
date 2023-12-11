<?php
declare(strict_types=1);
class Rectangle
{
    private int|float $length;
    private int|float $width;

    public function __construct($length, $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    public function getArea(): int|float
    {
        return $this->length * $this->width;
    }

    public function getPerimeter(): int|float
    {
        return 2*($this->length + $this->width);
    }

}

$myfirstReactangle = new Rectangle(10, 10.20);

echo $myfirstReactangle->getArea() . PHP_EOL;
echo $myfirstReactangle->getPerimeter() . PHP_EOL;
