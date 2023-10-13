<?php

interface Phone
{
    public function makeCall(int $number);

    public function sendMessage(int $number, string $message);
}

class IOS implements Phone
{
    public function makeCall(int $number): void
    {
        echo "Calling to $number" . PHP_EOL;
    }
    public function sendMessage(int $number, string $message): void
    {
        echo "$message " . PHP_EOL . "Your Message to Phone Number $number Successfully Send";
    }
}

$client = new IOS();
$client->makeCall(1638574281);
$client->sendMessage(1638574281, "Hello there!");