<?php
// ============================================
// 🚀 PHP 8.5 (Released: November 20, 2025)
// ============================================

// 1) PIPE OPERATOR |>
// ============================================
// * The pipe operator allows chaining function calls left-to-right,
// * passing values through multiple functions without intermediary variables.

// ❌ OLD WAY: Nested functions (hard to read)
$text = ' PHP 8.5 Released ';
$slug = strtolower(
    str_replace('.', '', 
        str_replace(' ', '-', 
            trim($text)
        )
    )
);
echo "Old way: $slug\n"; // Output: php-85-released

// ✅ NEW WAY: Pipe operator (readable left-to-right)
$slug = ' PHP 8.5 Released '
    |> trim(...)
    |> str_replace(' ', '-', ...)
    |> str_replace('.', '', ...)
    |> strtolower(...);
echo "Pipe operator: $slug\n"; // Output: php-85-released

// Using closures in pipe
$result = 'Hello World'
    |> strtoupper(...)
    |> (fn($s) => str_replace(' ', '-', $s))
    |> strtolower(...);
echo "Result: $result\n"; // Output: hello-world


// 2) URI EXTENSION
// ============================================
// * New built-in URI extension for parsing, normalizing, and handling URLs
// * Following RFC 3986 and WHATWG URL standards

// ❌ OLD WAY: parse_url() (unreliable with malformed URLs)
$components = parse_url('https://php.net/releases/8.5/en.php?version=latest#features');
echo "Old parse_url host: " . $components['host'] . "\n";

// ✅ NEW WAY: URI Extension (RFC 3986)
use Uri\Rfc3986\Uri;

$uri = new Uri('https://php.net/releases/8.5/en.php?version=latest#features');
echo "URI host: " . $uri->getHost() . "\n"; // php.net
echo "URI path: " . $uri->getPath() . "\n"; // /releases/8.5/en.php
echo "URI scheme: " . $uri->getScheme() . "\n"; // https
echo "URI query: " . $uri->getQuery() . "\n"; // version=latest
echo "URI fragment: " . $uri->getFragment() . "\n"; // features

// Modifying URIs (immutable)
$newUri = $uri->withPath('/docs/latest.php');
echo "Modified URI: " . (string)$newUri . "\n";

// WHATWG URL Standard
use Uri\Whatwg\Url;

$url = new Url('https://example.com/path');
echo "WHATWG host: " . $url->getHost() . "\n";


// 3) CLONE WITH
// ============================================
// * Clone objects and update properties in one operation
// * Perfect for readonly classes and immutable patterns

class Book {
    public function __construct(
        public readonly string $title,
        public readonly string $author,
        public readonly int $year
    ) {}
    
    // The "wither" pattern made simple
    public function withTitle(string $title): self {
        return clone($this, [
            'title' => $title
        ]);
    }
    
    public function withYear(int $year): self {
        return clone($this, [
            'year' => $year
        ]);
    }
}

$book = new Book('PHP Guide', 'John Doe', 2024);
echo "Original: {$book->title} ({$book->year})\n";

$updatedBook = $book->withTitle('PHP 8.5 Guide')->withYear(2025);
echo "Updated: {$updatedBook->title} ({$updatedBook->year})\n";

// Clone multiple properties at once
$newBook = clone($book, [
    'title' => 'Advanced PHP',
    'year' => 2025
]);
echo "New book: {$newBook->title} ({$newBook->year})\n";


// 4) array_first() and array_last()
// ============================================
// * Native functions to get first and last array elements
// * Complement array_key_first() and array_key_last() from PHP 7.3

$users = ['Alice', 'Bob', 'Charlie', 'Diana'];

echo "First user: " . array_first($users) . "\n"; // Alice
echo "Last user: " . array_last($users) . "\n"; // Diana

// Works with associative arrays
$data = [
    'name' => 'John',
    'age' => 30,
    'city' => 'Berlin'
];

echo "First value: " . array_first($data) . "\n"; // John
echo "Last value: " . array_last($data) . "\n"; // Berlin

// Returns null for empty arrays (works with null coalescing)
$empty = [];
echo "Empty first: " . (array_first($empty) ?? 'N/A') . "\n"; // N/A
echo "Empty last: " . (array_last($empty) ?? 'N/A') . "\n"; // N/A

// Works even when array keys are not sequential
$numbers = [10, 20, 30];
unset($numbers[0]);
echo "First after unset: " . array_first($numbers) . "\n"; // 20
echo "Last after unset: " . array_last($numbers) . "\n"; // 30


// 5) #[\NoDiscard] ATTRIBUTE
// ============================================
// * Warns when a return value isn't used
// * Helps prevent mistakes and improves API safety

#[\NoDiscard("processing might fail for individual items")]
function processData(array $items): array {
    return array_map(fn($item) => strtoupper($item), $items);
}

// ❌ This triggers a warning (return value not used)
// processData(['a', 'b', 'c']);

// ✅ These are OK
$result = processData(['a', 'b', 'c']);
echo "Processed: " . implode(', ', $result) . "\n";

// Explicitly discard (suppresses warning)
(void) processData(['x', 'y', 'z']);


// 6) CLOSURES IN CONSTANT EXPRESSIONS
// ============================================
// * Static closures and first-class callables in constant expressions
// * Useful for attribute parameters and class constants

// Example with attributes
#[\Attribute]
class SkipDiscovery {
    public function __construct(
        public \Closure $condition
    ) {}
}

// Can now use closures as default attribute values
#[SkipDiscovery(
    static fn() => true
)]
class MyService {
    // Class implementation
}

// Class constants with callables
class MathOperations {
    public const DOUBLE = static fn($x) => $x * 2;
    public const SQUARE = static fn($x) => $x ** 2;
}

$double = MathOperations::DOUBLE;
echo "Double of 5: " . $double(5) . "\n"; // 10


// 7) ASYMMETRIC VISIBILITY FOR STATIC PROPERTIES
// ============================================
// * Extends asymmetric visibility from PHP 8.4 to static properties
// * Different access levels for reading and writing

class Configuration {
    public private(set) static string $environment = 'production';
    public private(set) static array $settings = [];
    
    public static function setEnvironment(string $env): void {
        // Can modify inside the class
        self::$environment = $env;
    }
    
    public static function addSetting(string $key, mixed $value): void {
        self::$settings[$key] = $value;
    }
}

// ✅ Reading is public
echo "Environment: " . Configuration::$environment . "\n";

// ❌ Writing from outside throws error
// Configuration::$environment = 'development'; // Error!

// ✅ Must use public method to modify
Configuration::setEnvironment('development');
echo "New environment: " . Configuration::$environment . "\n";


// 8) FATAL ERROR BACKTRACES
// ============================================
// * Fatal errors now include stack traces by default
// * Controlled by fatal_error_backtraces INI setting (default: On)

// Example: When this would cause a fatal error
// function infiniteLoop() {
//     infiniteLoop();
// }
// infiniteLoop();

// Output would now include:
// Fatal error: Maximum execution time exceeded
// Stack trace:
// #0 script.php(10): infiniteLoop()
// #1 script.php(10): infiniteLoop()
// ...


// 9) PHP_BUILD_DATE CONSTANT
// ============================================
// * New constant containing PHP build timestamp
// * Useful for debugging and deployment tracking

echo "PHP Version: " . PHP_VERSION . "\n";
echo "PHP Build Date: " . PHP_BUILD_DATE . "\n";
// Example output: Nov 20 2025 10:30:45


// 10) --ini=diff CLI OPTION
// ============================================
// * Shows only non-default INI settings
// * Helps identify configuration changes

// Run in terminal:
// php --ini=diff
// 
// Example output:
// memory_limit = 256M (default: 128M)
// max_execution_time = 60 (default: 30)


// 11) get_error_handler() and get_exception_handler()
// ============================================
// * Retrieve current error and exception handlers
// * Useful for debugging and handler chaining

// Set custom handlers
set_error_handler(function($errno, $errstr) {
    echo "Custom error handler: $errstr\n";
});

set_exception_handler(function($exception) {
    echo "Custom exception handler: " . $exception->getMessage() . "\n";
});

// Retrieve handlers
$errorHandler = get_error_handler();
$exceptionHandler = get_exception_handler();

echo "Error handler set: " . (is_callable($errorHandler) ? 'Yes' : 'No') . "\n";
echo "Exception handler set: " . (is_callable($exceptionHandler) ? 'Yes' : 'No') . "\n";

// Useful for temporarily overriding handlers
$originalHandler = get_error_handler();
set_error_handler(function($errno, $errstr) use ($originalHandler) {
    // Custom handling
    echo "Temporary handler\n";
    
    // Call original if needed
    if ($originalHandler) {
        $originalHandler($errno, $errstr);
    }
});


// 12) OPCACHE ALWAYS COMPILED
// ============================================
// * OPcache is now always compiled into PHP (no longer optional)
// * Still controlled by INI settings (opcache.enable)

// Check OPcache status
$opcacheStatus = opcache_get_status();
echo "OPcache enabled: " . ($opcacheStatus !== false ? 'Yes' : 'No') . "\n";


// 13) PRACTICAL EXAMPLE: COMBINING MULTIPLE FEATURES
// ============================================

// Define a data processing pipeline using pipe operator
function cleanText(string $text): string {
    return $text
        |> trim(...)
        |> strtolower(...)
        |> (fn($s) => preg_replace('/[^a-z0-9\s-]/', '', $s))
        |> (fn($s) => preg_replace('/\s+/', '-', $s))
        |> (fn($s) => trim($s, '-'));
}

// Immutable configuration with clone with
class AppConfig {
    public function __construct(
        public readonly string $name,
        public readonly string $version,
        public readonly array $features = []
    ) {}
    
    public function withFeature(string $feature): self {
        return clone($this, [
            'features' => [...$this->features, $feature]
        ]);
    }
}

$config = new AppConfig('MyApp', '1.0.0');
$newConfig = $config
    ->withFeature('pipe-operator')
    ->withFeature('uri-extension');

echo "Features: " . implode(', ', $newConfig->features) . "\n";

// Using new array helpers
$data = ['apple', 'banana', 'cherry', 'date'];
echo "First fruit: " . array_first($data) . "\n";
echo "Last fruit: " . array_last($data) . "\n";


echo "\n=== PHP 8.5 Features Guide Complete ===\n";
echo "Released: November 20, 2025\n";
echo "Active Support Until: December 31, 2027\n";
echo "Security Support Until: December 31, 2029\n";
?>