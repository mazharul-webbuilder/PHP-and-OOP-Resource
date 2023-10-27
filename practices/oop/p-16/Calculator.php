<?php

class Calculator
{
    private $result;

    public function getResult()
    {
        return $this->result;
    }

    public function add($num1, $num2): void
    {
        $this->result = $num1 + $num2;
    }

    public function multiply($num1, $num2): void
    {
        $this->result = $num1 * $num2;
    }
}


