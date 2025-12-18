<?php

/**
 * SOLID Principles in PHP - Complete Guide
 *
 * SOLID is an acronym for five design principles intended to make software designs more understandable,
 * flexible, and maintainable. These principles were introduced by Robert C. Martin (Uncle Bob).
 *
 * S - Single Responsibility Principle (SRP)
 * O - Open-Closed Principle (OCP)
 * L - Liskov Substitution Principle (LSP)
 * I - Interface Segregation Principle (ISP)
 * D - Dependency Inversion Principle (DIP)
 *
 * Below is a comprehensive explanation of each principle with examples, violations, and best practices.
 */

// =============================================================================
// 1. SINGLE RESPONSIBILITY PRINCIPLE (SRP)
// =============================================================================

/**
 * A class should have only one reason to change, meaning it should have only one job.
 * This principle promotes high cohesion and low coupling.
 */

// VIOLATION EXAMPLE
class UserManager {
    public function createUser($data) {
        // Validate data
        // Save to database
        // Send welcome email
        // Log the action
    }

    public function sendEmail($user, $message) {
        // Email sending logic
    }

    public function logAction($action) {
        // Logging logic
    }
}

// CORRECT IMPLEMENTATION
class User {
    private $name;
    private $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName() { return $this->name; }
    public function getEmail() { return $this->email; }
}

class UserRepository {
    public function save(User $user) {
        // Database logic only
        echo "Saving user to database\n";
    }
}

class EmailService {
    public function sendWelcomeEmail(User $user) {
        // Email logic only
        echo "Sending welcome email to " . $user->getEmail() . "\n";
    }
}

class Logger {
    public function log($message) {
        // Logging logic only
        echo "Logging: $message\n";
    }
}

class UserService {
    private $repository;
    private $emailService;
    private $logger;

    public function __construct(UserRepository $repository, EmailService $emailService, Logger $logger) {
        $this->repository = $repository;
        $this->emailService = $emailService;
        $this->logger = $logger;
    }

    public function createUser($name, $email) {
        $user = new User($name, $email);
        $this->repository->save($user);
        $this->emailService->sendWelcomeEmail($user);
        $this->logger->log("User $name created");
    }
}

// =============================================================================
// 2. OPEN-CLOSED PRINCIPLE (OCP)
// =============================================================================

/**
 * Software entities (classes, modules, functions) should be open for extension
 * but closed for modification. You should be able to add new functionality
 * without changing existing code.
 */

// VIOLATION EXAMPLE
class PaymentProcessor {
    public function processPayment($type, $amount) {
        if ($type === 'credit_card') {
            // Process credit card
            echo "Processing credit card payment of $amount\n";
        } elseif ($type === 'paypal') {
            // Process PayPal
            echo "Processing PayPal payment of $amount\n";
        } elseif ($type === 'bitcoin') {
            // Process Bitcoin
            echo "Processing Bitcoin payment of $amount\n";
        }
    }
}

// CORRECT IMPLEMENTATION
interface PaymentMethod {
    public function process($amount);
}

class CreditCardPayment implements PaymentMethod {
    public function process($amount) {
        echo "Processing credit card payment of $amount\n";
    }
}

class PayPalPayment implements PaymentMethod {
    public function process($amount) {
        echo "Processing PayPal payment of $amount\n";
    }
}

class BitcoinPayment implements PaymentMethod {
    public function process($amount) {
        echo "Processing Bitcoin payment of $amount\n";
    }
}

class PaymentProcessorOCP {
    private $paymentMethods = [];

    public function addPaymentMethod($type, PaymentMethod $method) {
        $this->paymentMethods[$type] = $method;
    }

    public function processPayment($type, $amount) {
        if (isset($this->paymentMethods[$type])) {
            $this->paymentMethods[$type]->process($amount);
        } else {
            throw new Exception("Unsupported payment type");
        }
    }
}

// =============================================================================
// 3. LISKOV SUBSTITUTION PRINCIPLE (LSP)
// =============================================================================

/**
 * Objects of a superclass should be replaceable with objects of its subclasses
 * without affecting the correctness of the program. Subtypes must be substitutable
 * for their base types.
 */

// VIOLATION EXAMPLE
class Rectangle {
    protected $width;
    protected $height;

    public function setWidth($width) { $this->width = $width; }
    public function setHeight($height) { $this->height = $height; }
    public function getWidth() { return $this->width; }
    public function getHeight() { return $this->height; }
    public function getArea() { return $this->width * $this->height; }
}

class Square extends Rectangle {
    public function setWidth($width) {
        $this->width = $width;
        $this->height = $width; // Violates LSP - changes both dimensions
    }

    public function setHeight($height) {
        $this->height = $height;
        $this->width = $height; // Violates LSP
    }
}

// This function expects Rectangle behavior but breaks with Square
function printArea(Rectangle $rect) {
    $rect->setWidth(5);
    $rect->setHeight(10);
    echo "Area: " . $rect->getArea() . "\n"; // Square will return 100, not 50
}

// CORRECT IMPLEMENTATION
interface Shape {
    public function getArea();
}

class RectangleLSP implements Shape {
    protected $width;
    protected $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea() {
        return $this->width * $this->height;
    }
}

class SquareLSP implements Shape {
    private $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function getArea() {
        return $this->side * $this->side;
    }
}

// =============================================================================
// 4. INTERFACE SEGREGATION PRINCIPLE (ISP)
// =============================================================================

/**
 * Clients should not be forced to depend on interfaces they do not use.
 * It's better to have many specific interfaces than one general-purpose interface.
 */

// VIOLATION EXAMPLE
interface Worker {
    public function work();
    public function eat();
    public function sleep();
}

class HumanWorker implements Worker {
    public function work() { echo "Working\n"; }
    public function eat() { echo "Eating\n"; }
    public function sleep() { echo "Sleeping\n"; }
}

class RobotWorker implements Worker {
    public function work() { echo "Working\n"; }
    public function eat() { throw new Exception("Robots don't eat"); }
    public function sleep() { throw new Exception("Robots don't sleep"); }
}

// CORRECT IMPLEMENTATION
interface Workable {
    public function work();
}

interface Eatable {
    public function eat();
}

interface Sleepable {
    public function sleep();
}

class HumanWorkerISP implements Workable, Eatable, Sleepable {
    public function work() { echo "Working\n"; }
    public function eat() { echo "Eating\n"; }
    public function sleep() { echo "Sleeping\n"; }
}

class RobotWorkerISP implements Workable {
    public function work() { echo "Working\n"; }
}

// =============================================================================
// 5. DEPENDENCY INVERSION PRINCIPLE (DIP)
// =============================================================================

/**
 * High-level modules should not depend on low-level modules. Both should depend on abstractions.
 * Abstractions should not depend on details. Details should depend on abstractions.
 */

// VIOLATION EXAMPLE
class MySQLConnection {
    public function connect() { /* MySQL connection logic */ }
}

class UserRepositoryDIP {
    private $db;

    public function __construct() {
        $this->db = new MySQLConnection(); // Tight coupling
    }

    public function save($user) {
        $this->db->connect();
        // Save logic
    }
}

// CORRECT IMPLEMENTATION
interface DatabaseConnection {
    public function connect();
    public function query($sql);
}

class MySQLConnectionDIP implements DatabaseConnection {
    public function connect() { echo "Connecting to MySQL\n"; }
    public function query($sql) { echo "Executing MySQL query: $sql\n"; }
}

class PostgreSQLConnection implements DatabaseConnection {
    public function connect() { echo "Connecting to PostgreSQL\n"; }
    public function query($sql) { echo "Executing PostgreSQL query: $sql\n"; }
}

class UserRepositoryDIPCorrect {
    private $db;

    public function __construct(DatabaseConnection $db) {
        $this->db = $db; // Depends on abstraction
    }

    public function save($user) {
        $this->db->connect();
        $this->db->query("INSERT INTO users...");
    }
}

// =============================================================================
// BENEFITS OF SOLID PRINCIPLES
// =============================================================================

/**
 * Benefits:
 * 1. Maintainability: Easier to modify and extend code
 * 2. Testability: Code is more modular and easier to unit test
 * 3. Reusability: Components can be reused in different contexts
 * 4. Flexibility: Changes in one part don't affect others
 * 5. Readability: Code is more organized and understandable
 * 6. Scalability: Easier to add new features without breaking existing code
 */

// =============================================================================
// COMMON PITFALLS AND BEST PRACTICES
// =============================================================================

/**
 * Common Pitfalls:
 * - Over-engineering: Don't apply SOLID blindly to simple code
 * - Interface pollution: Creating too many interfaces
 * - Misunderstanding LSP: Not all inheritance is substitution
 * - Tight coupling: Forgetting dependency injection
 *
 * Best Practices:
 * - Start with SRP: Ensure each class has a single responsibility
 * - Use interfaces: Define contracts for your classes
 * - Dependency injection: Pass dependencies rather than creating them
 * - Refactor gradually: Apply SOLID principles during refactoring
 * - Write tests: SOLID code is easier to test
 * - Code reviews: Discuss SOLID compliance in code reviews
 */

// =============================================================================
// PRACTICAL EXAMPLE: BUILDING A SIMPLE BLOG SYSTEM
// =============================================================================

interface PostRepository {
    public function save(Post $post);
    public function findById($id);
}

interface NotificationService {
    public function send($message, $recipient);
}

class Post {
    private $id;
    private $title;
    private $content;

    public function __construct($title, $content) {
        $this->title = $title;
        $this->content = $content;
    }

    // Getters...
}

class DatabasePostRepository implements PostRepository {
    public function save(Post $post) { /* DB save logic */ }
    public function findById($id) { /* DB find logic */ }
}

class EmailNotificationService implements NotificationService {
    public function send($message, $recipient) { /* Email logic */ }
}

class PostService {
    private $repository;
    private $notifier;

    public function __construct(PostRepository $repository, NotificationService $notifier) {
        $this->repository = $repository;
        $this->notifier = $notifier;
    }

    public function publishPost($title, $content, $authorEmail) {
        $post = new Post($title, $content);
        $this->repository->save($post);
        $this->notifier->send("New post published: $title", $authorEmail);
    }
}

// =============================================================================
// TESTING SOLID CODE
// =============================================================================

/**
 * SOLID principles make testing easier:
 * - SRP: Test one responsibility at a time
 * - OCP: Test extensions without modifying existing tests
 * - LSP: Test subtypes work with base type contracts
 * - ISP: Test only relevant interfaces
 * - DIP: Mock dependencies easily
 */

// Example test (conceptual)
class PostServiceTest {
    public function testPublishPost() {
        // Mock dependencies
        $mockRepo = $this->createMock(PostRepository::class);
        $mockNotifier = $this->createMock(NotificationService::class);

        // Set expectations
        $mockRepo->expects($this->once())->method('save');
        $mockNotifier->expects($this->once())->method('send');

        // Test
        $service = new PostService($mockRepo, $mockNotifier);
        $service->publishPost("Test Title", "Test Content", "test@example.com");
    }
}

// =============================================================================
// CONCLUSION
// =============================================================================

/**
 * SOLID principles are guidelines, not strict rules. Apply them judiciously based on:
 * - Project size and complexity
 * - Team experience
 * - Time constraints
 * - Future maintenance needs
 *
 * Remember: "The best code is the code that works and is easy to change."
 */

?>