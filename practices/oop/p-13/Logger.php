<?php
declare(strict_types=1);

class Logger
{
    /*We can declare any static method or properties with any access modifier
        The difference is you can only access public properties and method outside the class without instance
        You can't access protected and private but in sub derived class can
    */
    public static int $logCount  = 0;

    public function log($message): void
    {
        echo $message . PHP_EOL;
        self::$logCount += 1;
    }
}