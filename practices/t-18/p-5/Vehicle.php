<?php

class Vehicle
{
    protected string $brand;
    protected string $model;
    protected int $year;

    public function __construct(string $brand, string $model, int $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function getVehicleDetails(): void
    {
        echo "$this->model of Brand ".strtoupper($this->brand)." is Launched in $this->year" . PHP_EOL;
    }
}