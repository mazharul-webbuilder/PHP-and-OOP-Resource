<?php

class Circle
{
    private int | float $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getArea(): int|float
    {
        return pi() * pow($this->radius, 2);
    }

    public function getCircumference(): int|float
    {
        return (2 * M_PI * $this->radius);
    }
}

$circle1 = new Circle(10.25);
echo $circle1->getArea() . PHP_EOL;
echo $circle1->getCircumference() . PHP_EOL;