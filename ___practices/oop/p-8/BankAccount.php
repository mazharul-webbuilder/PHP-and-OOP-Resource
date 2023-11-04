<?php

class BankAccount
{
    protected mixed $accountNumber;
    private int|float $balance = 0;

    public function __construct(mixed $accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }
    public function depositMoney(int|float $balance): int|float
    {
        return $this->balance += $balance;
    }

    public function withdrawMoney(int|float $amount): void
    {
        if ($this->balance < $amount) {
            echo "Insufficient Balance" . PHP_EOL;
        } else {
            $this->balance -= $amount;
            echo "Withdraw Successful. Your new balance is $this->balance" .  PHP_EOL;
        }

    }

}