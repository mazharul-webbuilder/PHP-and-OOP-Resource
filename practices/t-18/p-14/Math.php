<?php
declare(strict_types=1);
require_once "Calculable.php";

class Math implements Calculable
{
    private static int $num1;
    private static int $num2;

    public function __construct(int $num1,int $num2)
    {
        self::$num1 = $num1;
        self::$num2 = $num2;
    }

    public function add(): void
    {
        echo "Sum Of ". self::$num1 . " and " . self::$num2 . " is " . (self::$num1 + self::$num2) . PHP_EOL;
    }

    public function subtract():void
    {
        echo "Subtraction from ". self::$num1 . " to " . self::$num2 . " is " . (self::$num1 - self::$num2) . PHP_EOL;

    }

    public function division(): void
    {
        echo "The Number ". self::$num1 . " divided by " . self::$num2 . " is " . (self::$num1 / self::$num2) . PHP_EOL;
    }

    public function multiply(): void
    {
        echo "The Number ". self::$num1 . " multiply by " . self::$num2 . " is " . (self::$num1 * self::$num2) . PHP_EOL;
    }

    public function compareSub($obj1,)
    {
        if ($obj1 instanceof Math) {
            echo PHP_EOL;
            echo PHP_EOL;
            echo PHP_EOL;
            echo $obj1->add();
        }
    }
}