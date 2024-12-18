<?php

// 🚀 PHP 8.1 (Released: November 25, 2021)

// Key Features:

// 1) Enums
//    * Create enumerations.
enum Status {
    case ACTIVE;
    case INACTIVE;
}

$status = Status::ACTIVE;
echo $status->name; // Outputs: ACTIVE



// 2) Readonly Properties
//    * Properties can only be set once.
class User {
    public readonly string $name;

    public function __construct(string $name) {
        $this->name = $name;  // Set once in constructor, cannot be changed afterward
    }
}

$user = new User("John");
echo $user->name;  // Outputs: John

// Uncommenting the next line would result in an error
// $user->name = "Jane";  // Error: Cannot modify readonly property



// 3) Fibers
//    * PHP 8.1 introduces fibers, a way to execute code in an interruptible and resumable manner (similar to coroutines).
$fiber = new Fiber(function (): void {
    echo "Fiber started\n";
    Fiber::suspend();  // Suspend the fiber here
    echo "Fiber resumed\n";
});

echo "Before Fiber\n";
$fiber->start();  // Starts the fiber
echo "After Fiber suspension\n";
$fiber->resume();  // Resumes the fiber after suspension



// 4) Intersection Types
//    * PHP 8.1 introduces intersection types, which allow you to specify that a value must satisfy multiple type constraints.
interface Logger {
    public function log(string $message): void;
}

interface Notifier {
    public function sendNotification(string $message): void;
}

class LoggerNotifier implements Logger, Notifier {
    public function log(string $message): void {
        echo "Log: $message\n";
    }

    public function sendNotification(string $message): void {
        echo "Sending Notification: $message\n";
    }
}

// Accepting intersection types: both Logger and Notifier
function performTasks(Logger&Notifier $service): void {
    $service->log("This is a log.");
    $service->sendNotification("This is a notification.");
}

$service = new LoggerNotifier();
performTasks($service);  // Outputs: Log: This is a log. Sending Notification: This is a notification.



// 5) Array Unpacking with String Keys
//    * PHP 8.1 allows array unpacking (`...`) to work with string keys.
$array1 = ["a" => 1, "b" => 2];
$array2 = ["b" => 3, "c" => 4];
$array3 = [...$array1, ...$array2];

print_r($array3);  // Outputs: Array ( [a] => 1 [b] => 3 [c] => 4 )



// 6) Performance Improvements
//    * PHP 8.1 introduces performance improvements, including optimizations to the engine and built-in functions.
echo 'PHP 8.1 brings performance improvements and optimizations.';

?>
