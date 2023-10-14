<?php

class Doctor
{
    protected int $fees;

    public function setFees($fees)
    {
        $this->fees = $fees;
    }

    public function calculateFees(): mixed
    {
        return $this->fees;
    }
}
class Specialist extends Doctor
{
    public function calculateFees(): mixed
    {
        return $this->fees + 100;
    }
}

$doctor =  new Doctor();
$doctor->setFees(500);
echo  "General Doctor Fee: " . $doctor->calculateFees() . PHP_EOL;

$specialist = new Specialist();
$specialist->setFees(700);
echo $specialist->calculateFees();
