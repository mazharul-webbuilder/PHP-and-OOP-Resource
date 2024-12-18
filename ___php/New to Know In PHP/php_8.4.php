<?php

//🚀 PHP 8.4 (Released: November 2024)

//Key Features:

//1)  Property Hooks
    //* Property hooks allow developers to define custom behavior when accessing or
    // modifying class properties. This feature provides greater control over property interactions, enabling more robust and encapsulated designs.
class User {
    private string $name;

    public function __get($property) {
        if ($property === 'name') {
            // Custom logic for accessing 'name'
            return $this->name;
        }
        throw new Exception("Undefined property: $property");
    }

    public function __set($property, $value) {
        if ($property === 'name') {
            // Custom logic for setting 'name'
            $this->name = $value;
            return;
        }
        throw new Exception("Undefined property: $property");
    }
}

$user = new User();
$user->name = 'Alice';
echo $user->name; // Outputs: Alice



//2)  Asymmetric Visibility
    //* Property hooks allow developers to define custom behavior when accessing or
    // Asymmetric visibility allows different access levels for property getters and setters, providing more granular control over property accessibility.
class Account {
    private float $balance = 0.0;

    public function getBalance(): float {
        return $this->balance;
    }

    protected function setBalance(float $amount): void {
        if ($amount >= 0) {
            $this->balance = $amount;
        } else {
            throw new Exception("Balance cannot be negative");
        }
    }
}

class SavingsAccount extends Account {
    public function deposit(float $amount): void {
        $this->setBalance($this->getBalance() + $amount);
    }
}

$account = new SavingsAccount();
$account->deposit(100.0);
echo $account->getBalance(); // Outputs: 100


//3)   Chaining new Without Parentheses
    //* PHP 8.4 allows method chaining directly on object instantiation without requiring additional parentheses, simplifying fluent interfaces.

class Builder {
    public function setName(string $name): self {
        // Set the name
        return $this;
    }

    public function build(): object {
        // Build and return the object
    }
}

$object = new Builder->setName('Example')->build();


//4) New Array Functions
    // Several new array functions have been introduced to streamline common operations:
    //
    //array_find(): Finds the first element that satisfies a callback.
    //array_find_key(): Finds the first key that satisfies a callback.
    //array_any(): Checks if any array element satisfies a callback.
    //array_all(): Checks if all array elements satisfy a callback.

$array = [1, 2, 3, 4, 5];

$firstEven = array_find($array, fn($value) => $value % 2 === 0);
echo $firstEven; // Outputs: 2

$allPositive = array_all($array, fn($value) => $value > 0);
var_dump($allPositive); // Outputs: bool(true)


$object = new Builder->setName('Example')->build();



//5) HTML5 Support in DOM Extension
    //* The DOM extension has been updated to fully support HTML5, improving the handling and manipulation of modern HTML documents.

$dom = new DOMDocument();
$dom->loadHTML('<!DOCTYPE html><html><body><p>Example</p></body></html>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
echo $dom->saveHTML();
ct = new Builder->setName('Example')->build();