<?php

/**
 * PHP Attributes Complete Guide
 *
 * PHP Attributes (introduced in PHP 8.0) provide a way to add metadata to classes,
 * methods, properties, parameters, and other code elements. This guide covers
 * all possible syntax and use cases for PHP attributes.
 *
 * Attributes are similar to annotations in other languages like Java or C#.
 */

// =============================================================================
// 1. BASIC ATTRIBUTE SYNTAX
// =============================================================================

/**
 * Basic attribute declaration and usage
 */

// Simple attribute without parameters
#[Attribute]
class SimpleAttribute {
}

// Attribute with parameters
#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class ConfigurableAttribute {
    public function __construct(
        public string $name,
        public ?string $description = null,
        public array $options = []
    ) {}
}

// =============================================================================
// 2. ATTRIBUTE TARGETS
// =============================================================================

/**
 * Attributes can be applied to different targets
 */

// Class attributes
#[Attribute(Attribute::TARGET_CLASS)]
class ClassAttribute {
    public function __construct(public string $value) {}
}

#[ClassAttribute("Controller")]
class UserController {
    // Class implementation
}

// Method attributes
#[Attribute(Attribute::TARGET_METHOD)]
class RouteAttribute {
    public function __construct(
        public string $path,
        public array $methods = ['GET']
    ) {}
}

class ApiController {
    #[Route("/users", ["GET", "POST"])]
    public function getUsers() {
        return ["users" => []];
    }

    #[Route("/users/{id}", ["GET", "PUT", "DELETE"])]
    public function getUser(int $id) {
        return ["user" => ["id" => $id]];
    }
}

// Property attributes
#[Attribute(Attribute::TARGET_PROPERTY)]
class ColumnAttribute {
    public function __construct(
        public string $name,
        public string $type = 'string',
        public ?int $length = null
    ) {}
}

class User {
    #[Column("user_id", "int")]
    public int $id;

    #[Column("user_name", "varchar", 255)]
    public string $name;

    #[Column("email", "varchar", 255)]
    public string $email;
}

// Parameter attributes
#[Attribute(Attribute::TARGET_PARAMETER)]
class QueryParamAttribute {
    public function __construct(public string $name) {}
}

class SearchController {
    public function search(
        #[QueryParam("q")] string $query,
        #[QueryParam("limit")] int $limit = 10
    ) {
        // Implementation
    }
}

// Function attributes
#[Attribute(Attribute::TARGET_FUNCTION)]
class DeprecatedAttribute {
    public function __construct(public string $message) {}
}

#[Deprecated("Use newSearchFunction instead")]
function oldSearchFunction($query) {
    return [];
}

// Constant attributes
#[Attribute(Attribute::TARGET_CLASS_CONSTANT)]
class ConstantAttribute {
    public function __construct(public string $description) {}
}

class Status {
    #[ConstantAttribute("Active user status")]
    const ACTIVE = 1;

    #[ConstantAttribute("Inactive user status")]
    const INACTIVE = 0;
}

// =============================================================================
// 3. MULTIPLE ATTRIBUTES
// =============================================================================

/**
 * Applying multiple attributes to the same element
 */

#[Attribute(Attribute::TARGET_CLASS)]
class TableAttribute {
    public function __construct(public string $name) {}
}

#[Attribute(Attribute::TARGET_CLASS)]
class CacheAttribute {
    public function __construct(public int $ttl = 3600) {}
}

#[Table("users")]
#[Cache(1800)]
class UserEntity {
    // Implementation
}

// =============================================================================
// 4. ATTRIBUTE FLAGS AND TARGETS
// =============================================================================

/**
 * Using attribute flags to specify multiple targets
 */

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class HttpMethodAttribute {
    public function __construct(public string $method) {}
}

#[HttpMethodAttribute("GET")]
class UserApi {
    #[HttpMethodAttribute("POST")]
    public function create() {
        // Implementation
    }
}

// All possible target flags
#[Attribute(
    Attribute::TARGET_CLASS |
    Attribute::TARGET_METHOD |
    Attribute::TARGET_PROPERTY |
    Attribute::TARGET_PARAMETER |
    Attribute::TARGET_FUNCTION |
    Attribute::TARGET_CLASS_CONSTANT
)]
class VersatileAttribute {
    public function __construct(public string $purpose) {}
}

// =============================================================================
// 5. REPEATED ATTRIBUTES
// =============================================================================

/**
 * Using the same attribute multiple times on the same element
 */

#[Attribute(Attribute::IS_REPEATABLE)]
class PermissionAttribute {
    public function __construct(public string $permission) {}
}

class AdminController {
    #[Permission("read")]
    #[Permission("write")]
    #[Permission("delete")]
    public function manageUsers() {
        // Implementation
    }
}

// =============================================================================
// 6. ATTRIBUTE INHERITANCE
// =============================================================================

/**
 * How attributes behave with inheritance
 */

#[Attribute(Attribute::TARGET_CLASS)]
class BaseAttribute {
    public function __construct(public string $baseValue) {}
}

#[BaseAttribute("parent")]
class ParentClass {
}

class ChildClass extends ParentClass {
    // ChildClass inherits the BaseAttribute from ParentClass
}

// =============================================================================
// 7. READING ATTRIBUTES WITH REFLECTION
// =============================================================================

/**
 * Using Reflection API to read attributes at runtime
 */

// Basic attribute reading
function getClassAttributeValue(string $className, string $attributeName): ?string {
    $reflection = new ReflectionClass($className);
    $attributes = $reflection->getAttributes($attributeName);

    if (empty($attributes)) {
        return null;
    }

    $attribute = $attributes[0]->newInstance();
    return $attribute->value ?? null;
}

// Reading method attributes
function getMethodAttributes(string $className, string $methodName): array {
    $reflection = new ReflectionMethod($className, $methodName);
    $attributes = $reflection->getAttributes();

    $result = [];
    foreach ($attributes as $attribute) {
        $result[] = $attribute->newInstance();
    }

    return $result;
}

// Reading property attributes
function getPropertyAttributes(string $className, string $propertyName): array {
    $reflection = new ReflectionProperty($className, $propertyName);
    $attributes = $reflection->getAttributes();

    $result = [];
    foreach ($attributes as $attribute) {
        $result[] = $attribute->newInstance();
    }

    return $result;
}

// =============================================================================
// 8. PRACTICAL USE CASES
// =============================================================================

// =============================================================================
// 8.1 DEPENDENCY INJECTION
// =============================================================================

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_PARAMETER)]
class InjectAttribute {
    public function __construct(public ?string $service = null) {}
}

#[Attribute(Attribute::TARGET_CLASS)]
class ServiceAttribute {
    public function __construct(public string $name) {}
}

#[Service("user_service")]
class UserService {
    public function getUser(int $id): array {
        return ['id' => $id, 'name' => 'John Doe'];
    }
}

class UserControllerDI {
    #[Inject("user_service")]
    private UserService $userService;

    public function __construct(#[Inject] Logger $logger) {
        // Constructor injection
    }

    public function getUser(int $id) {
        return $this->userService->getUser($id);
    }
}

// =============================================================================
// 8.2 ROUTING SYSTEM
// =============================================================================

#[Attribute(Attribute::TARGET_METHOD)]
class RouteAttribute {
    public function __construct(
        public string $path,
        public array $methods = ['GET'],
        public array $middleware = []
    ) {}
}

#[Attribute(Attribute::TARGET_METHOD)]
class MiddlewareAttribute {
    public function __construct(public string $name) {}
}

class Router {
    private array $routes = [];

    public function registerRoutes(string $controllerClass): void {
        $reflection = new ReflectionClass($controllerClass);

        foreach ($reflection->getMethods() as $method) {
            $routeAttributes = $method->getAttributes(RouteAttribute::class);

            foreach ($routeAttributes as $routeAttr) {
                $route = $routeAttr->newInstance();

                $middlewareAttributes = $method->getAttributes(MiddlewareAttribute::class);
                $middleware = array_map(
                    fn($attr) => $attr->newInstance()->name,
                    $middlewareAttributes
                );

                $this->routes[] = [
                    'path' => $route->path,
                    'methods' => $route->methods,
                    'controller' => $controllerClass,
                    'method' => $method->getName(),
                    'middleware' => array_merge($route->middleware, $middleware)
                ];
            }
        }
    }

    public function getRoutes(): array {
        return $this->routes;
    }
}

class ApiController {
    #[Route("/api/users", ["GET"])]
    #[Middleware("auth")]
    public function getUsers() {
        return ['users' => []];
    }

    #[Route("/api/users", ["POST"])]
    #[Middleware("auth")]
    #[Middleware("admin")]
    public function createUser() {
        return ['user' => ['id' => 1]];
    }
}

// =============================================================================
// 8.3 VALIDATION SYSTEM
// =============================================================================

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class ValidateAttribute {
    public function __construct(public string $rule, public array $params = []) {}
}

#[Attribute(Attribute::TARGET_PROPERTY)]
class RequiredAttribute extends ValidateAttribute {
    public function __construct() {
        parent::__construct('required');
    }
}

#[Attribute(Attribute::TARGET_PROPERTY)]
class LengthAttribute extends ValidateAttribute {
    public function __construct(public int $min = 0, public int $max = PHP_INT_MAX) {
        parent::__construct('length', ['min' => $min, 'max' => $max]);
    }
}

#[Attribute(Attribute::TARGET_PROPERTY)]
class EmailAttribute extends ValidateAttribute {
    public function __construct() {
        parent::__construct('email');
    }
}

class UserModel {
    #[Required]
    #[Length(2, 50)]
    public string $name;

    #[Required]
    #[Email]
    public string $email;

    #[Length(8, 100)]
    public string $password;
}

class Validator {
    public function validate(object $object): array {
        $errors = [];
        $reflection = new ReflectionClass($object);

        foreach ($reflection->getProperties() as $property) {
            $value = $property->getValue($object);
            $attributes = $property->getAttributes(ValidateAttribute::class, ReflectionAttribute::IS_INSTANCEOF);

            foreach ($attributes as $attribute) {
                $validator = $attribute->newInstance();
                $error = $this->validateRule($validator->rule, $value, $validator->params);

                if ($error) {
                    $errors[$property->getName()][] = $error;
                }
            }
        }

        return $errors;
    }

    private function validateRule(string $rule, $value, array $params = []): ?string {
        switch ($rule) {
            case 'required':
                return empty($value) ? 'This field is required' : null;

            case 'length':
                $length = strlen($value);
                if ($length < ($params['min'] ?? 0)) {
                    return "Minimum length is {$params['min']}";
                }
                if ($length > ($params['max'] ?? PHP_INT_MAX)) {
                    return "Maximum length is {$params['max']}";
                }
                return null;

            case 'email':
                return filter_var($value, FILTER_VALIDATE_EMAIL) ? null : 'Invalid email format';

            default:
                return null;
        }
    }
}

// =============================================================================
// 8.4 DATABASE MAPPING
// =============================================================================

#[Attribute(Attribute::TARGET_CLASS)]
class TableAttribute {
    public function __construct(public string $name) {}
}

#[Attribute(Attribute::TARGET_PROPERTY)]
class ColumnAttribute {
    public function __construct(
        public string $name,
        public string $type = 'string',
        public bool $nullable = false,
        public $default = null
    ) {}
}

#[Attribute(Attribute::TARGET_PROPERTY)]
class PrimaryKeyAttribute {
    public function __construct(public bool $autoIncrement = true) {}
}

#[Attribute(Attribute::TARGET_PROPERTY)]
class ForeignKeyAttribute {
    public function __construct(
        public string $table,
        public string $column,
        public ?string $onDelete = null
    ) {}
}

#[Table("users")]
class UserEntity {
    #[PrimaryKey]
    #[Column("id", "int")]
    public int $id;

    #[Column("name", "varchar", false)]
    public string $name;

    #[Column("email", "varchar", false)]
    public string $email;

    #[ForeignKey("roles", "id", "SET NULL")]
    #[Column("role_id", "int", true)]
    public ?int $roleId;
}

class EntityManager {
    public function createTable(string $entityClass): string {
        $reflection = new ReflectionClass($entityClass);
        $tableAttr = $reflection->getAttributes(TableAttribute::class)[0] ?? null;

        if (!$tableAttr) {
            throw new Exception("Entity must have Table attribute");
        }

        $table = $tableAttr->newInstance();
        $columns = [];

        foreach ($reflection->getProperties() as $property) {
            $columnAttr = $property->getAttributes(ColumnAttribute::class)[0] ?? null;
            if (!$columnAttr) continue;

            $column = $columnAttr->newInstance();
            $columnDef = $this->buildColumnDefinition($property, $column);

            $columns[] = $columnDef;
        }

        return "CREATE TABLE {$table->name} (\n  " . implode(",\n  ", $columns) . "\n);";
    }

    private function buildColumnDefinition(ReflectionProperty $property, ColumnAttribute $column): string {
        $def = "{$column->name} {$this->mapType($column->type)}";

        if (!$column->nullable) {
            $def .= " NOT NULL";
        }

        if ($column->default !== null) {
            $def .= " DEFAULT " . (is_string($column->default) ? "'{$column->default}'" : $column->default);
        }

        // Check for primary key
        $pkAttr = $property->getAttributes(PrimaryKeyAttribute::class)[0] ?? null;
        if ($pkAttr) {
            $pk = $pkAttr->newInstance();
            $def .= " PRIMARY KEY";
            if ($pk->autoIncrement) {
                $def .= " AUTO_INCREMENT";
            }
        }

        // Check for foreign key
        $fkAttr = $property->getAttributes(ForeignKeyAttribute::class)[0] ?? null;
        if ($fkAttr) {
            $fk = $fkAttr->newInstance();
            $def .= ",\n  FOREIGN KEY ({$column->name}) REFERENCES {$fk->table}({$fk->column})";
            if ($fk->onDelete) {
                $def .= " ON DELETE {$fk->onDelete}";
            }
        }

        return $def;
    }

    private function mapType(string $type): string {
        return match ($type) {
            'int' => 'INT',
            'varchar' => 'VARCHAR(255)',
            'text' => 'TEXT',
            'datetime' => 'DATETIME',
            'boolean' => 'TINYINT(1)',
            default => 'VARCHAR(255)'
        };
    }
}

// =============================================================================
// 8.5 SERIALIZATION CONTROL
// =============================================================================

#[Attribute(Attribute::TARGET_PROPERTY)]
class SerializeAttribute {
    public function __construct(
        public bool $include = true,
        public ?string $name = null,
        public array $groups = []
    ) {}
}

#[Attribute(Attribute::TARGET_PROPERTY)]
class ExcludeAttribute {
}

class UserDTO {
    #[Serialize(name: "user_id")]
    public int $id;

    #[Serialize]
    public string $name;

    #[Serialize]
    public string $email;

    #[Exclude]
    public string $password;

    #[Serialize(groups: ["admin"])]
    public bool $isAdmin;
}

class Serializer {
    public function serialize(object $object, array $groups = []): array {
        $reflection = new ReflectionClass($object);
        $data = [];

        foreach ($reflection->getProperties() as $property) {
            $excludeAttr = $property->getAttributes(ExcludeAttribute::class);
            if (!empty($excludeAttr)) {
                continue;
            }

            $serializeAttr = $property->getAttributes(SerializeAttribute::class)[0] ?? null;
            if ($serializeAttr) {
                $config = $serializeAttr->newInstance();

                if (!$config->include) {
                    continue;
                }

                if (!empty($config->groups) && !array_intersect($groups, $config->groups)) {
                    continue;
                }

                $name = $config->name ?? $property->getName();
                $data[$name] = $property->getValue($object);
            } else {
                // Include by default if no attribute
                $data[$property->getName()] = $property->getValue($object);
            }
        }

        return $data;
    }
}

// =============================================================================
// 8.6 EVENT SYSTEM
// =============================================================================

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class EventListenerAttribute {
    public function __construct(public string $event) {}
}

#[Attribute(Attribute::TARGET_METHOD)]
class EventSubscriberAttribute {
    public function __construct(public array $events) {}
}

class EventDispatcher {
    private array $listeners = [];

    public function addListener(string $event, callable $listener): void {
        $this->listeners[$event][] = $listener;
    }

    public function dispatch(string $event, $data = null): void {
        if (!isset($this->listeners[$event])) {
            return;
        }

        foreach ($this->listeners[$event] as $listener) {
            $listener($data);
        }
    }

    public function registerSubscribers(): void {
        // Scan for classes with event listeners
        $classes = get_declared_classes();

        foreach ($classes as $className) {
            $reflection = new ReflectionClass($className);

            // Check for EventSubscriber attribute
            $subscriberAttr = $reflection->getAttributes(EventSubscriberAttribute::class)[0] ?? null;
            if ($subscriberAttr) {
                $config = $subscriberAttr->newInstance();
                $instance = $reflection->newInstance();

                foreach ($config->events as $event) {
                    $this->addListener($event, [$instance, 'on' . ucfirst($event)]);
                }
            }

            // Check for EventListener attributes on methods
            foreach ($reflection->getMethods() as $method) {
                $listenerAttrs = $method->getAttributes(EventListenerAttribute::class);

                foreach ($listenerAttrs as $attr) {
                    $config = $attr->newInstance();
                    $instance = $reflection->newInstance();
                    $this->addListener($config->event, [$instance, $method->getName()]);
                }
            }
        }
    }
}

#[EventSubscriber(["user_created", "user_updated"])]
class UserEventHandler {
    public function onUserCreated($user) {
        echo "User created: {$user['name']}\n";
    }

    public function onUserUpdated($user) {
        echo "User updated: {$user['name']}\n";
    }
}

class OrderEventHandler {
    #[EventListener("order_placed")]
    public function onOrderPlaced($order) {
        echo "Order placed: {$order['id']}\n";
    }

    #[EventListener("order_cancelled")]
    public function onOrderCancelled($order) {
        echo "Order cancelled: {$order['id']}\n";
    }
}

// =============================================================================
// 8.7 CACHING SYSTEM
// =============================================================================

#[Attribute(Attribute::TARGET_METHOD)]
class CacheAttribute {
    public function __construct(
        public int $ttl = 3600,
        public ?string $key = null,
        public array $tags = []
    ) {}
}

#[Attribute(Attribute::TARGET_METHOD)]
class CacheInvalidateAttribute {
    public function __construct(public array $tags) {}
}

class CacheManager {
    private array $cache = [];

    public function get(string $key) {
        return $this->cache[$key] ?? null;
    }

    public function set(string $key, $value, int $ttl = 3600): void {
        $this->cache[$key] = $value;
        // In real implementation, set expiration
    }

    public function invalidate(array $tags): void {
        // In real implementation, invalidate by tags
        echo "Invalidating cache for tags: " . implode(', ', $tags) . "\n";
    }
}

class CachedUserService {
    private CacheManager $cache;

    public function __construct() {
        $this->cache = new CacheManager();
    }

    #[Cache(ttl: 300, key: "users_list")]
    public function getAllUsers(): array {
        $cached = $this->cache->get("users_list");
        if ($cached) {
            return $cached;
        }

        $users = [
            ['id' => 1, 'name' => 'John'],
            ['id' => 2, 'name' => 'Jane']
        ];

        $this->cache->set("users_list", $users, 300);
        return $users;
    }

    #[Cache(ttl: 600, key: "user_{id}")]
    public function getUser(int $id): ?array {
        $key = "user_{$id}";
        $cached = $this->cache->get($key);
        if ($cached) {
            return $cached;
        }

        $user = ['id' => $id, 'name' => 'User ' . $id];
        $this->cache->set($key, $user, 600);
        return $user;
    }

    #[CacheInvalidate(["users"])]
    public function createUser(array $userData): int {
        // Create user logic
        $id = rand(1000, 9999);
        echo "Created user with ID: $id\n";
        return $id;
    }
}

// =============================================================================
// 8.8 TESTING FRAMEWORK
// =============================================================================

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class TestAttribute {
    public function __construct(public ?string $name = null) {}
}

#[Attribute(Attribute::TARGET_METHOD)]
class BeforeEachAttribute {
}

#[Attribute(Attribute::TARGET_METHOD)]
class AfterEachAttribute {
}

#[Attribute(Attribute::TARGET_METHOD)]
class DataProviderAttribute {
    public function __construct(public string $method) {}
}

class TestRunner {
    public function runTests(string $testClass): void {
        $reflection = new ReflectionClass($testClass);
        $instance = $reflection->newInstance();

        $beforeEach = null;
        $afterEach = null;

        // Find setup/teardown methods
        foreach ($reflection->getMethods() as $method) {
            if ($method->getAttributes(BeforeEachAttribute::class)) {
                $beforeEach = $method;
            }
            if ($method->getAttributes(AfterEachAttribute::class)) {
                $afterEach = $method;
            }
        }

        // Run tests
        foreach ($reflection->getMethods() as $method) {
            $testAttrs = $method->getAttributes(TestAttribute::class);

            if (empty($testAttrs)) {
                continue;
            }

            echo "Running test: {$method->getName()}\n";

            // Run beforeEach
            if ($beforeEach) {
                $beforeEach->invoke($instance);
            }

            try {
                // Check for data provider
                $dataProviderAttr = $method->getAttributes(DataProviderAttribute::class)[0] ?? null;
                if ($dataProviderAttr) {
                    $provider = $dataProviderAttr->newInstance();
                    $dataMethod = $reflection->getMethod($provider->method);
                    $testData = $dataMethod->invoke($instance);

                    foreach ($testData as $data) {
                        $method->invoke($instance, ...$data);
                    }
                } else {
                    $method->invoke($instance);
                }

                echo "✓ Test passed\n";
            } catch (Exception $e) {
                echo "✗ Test failed: {$e->getMessage()}\n";
            }

            // Run afterEach
            if ($afterEach) {
                $afterEach->invoke($instance);
            }
        }
    }
}

class UserServiceTest {
    private $userService;

    #[BeforeEach]
    public function setUp(): void {
        $this->userService = new UserService();
    }

    #[AfterEach]
    public function tearDown(): void {
        $this->userService = null;
    }

    #[Test]
    public function testGetUser(): void {
        $user = $this->userService->getUser(1);
        assert($user['id'] === 1);
    }

    #[Test("Test user creation")]
    public function testCreateUser(): void {
        // Test implementation
        assert(true);
    }

    #[Test]
    #[DataProvider("userDataProvider")]
    public function testUserValidation($userData, $expected): void {
        // Test with data provider
        assert(true);
    }

    public function userDataProvider(): array {
        return [
            [['name' => 'John', 'email' => 'john@example.com'], true],
            [['name' => '', 'email' => 'invalid'], false],
        ];
    }
}

// =============================================================================
// 9. ADVANCED ATTRIBUTE FEATURES
// =============================================================================

// =============================================================================
// 9.1 ATTRIBUTE CONSTANTS
// =============================================================================

#[Attribute(Attribute::TARGET_ALL)]
class AdvancedAttribute {
    public const PRIORITY_HIGH = 1;
    public const PRIORITY_MEDIUM = 2;
    public const PRIORITY_LOW = 3;

    public function __construct(
        public int $priority = self::PRIORITY_MEDIUM,
        public array $metadata = []
    ) {}
}

// =============================================================================
// 9.2 ATTRIBUTE INHERITANCE AND POLYMORPHISM
// =============================================================================

#[Attribute(Attribute::TARGET_METHOD)]
class HttpMethodAttribute {
    public function __construct(public string $method) {}
}

#[Attribute(Attribute::TARGET_METHOD)]
class GetAttribute extends HttpMethodAttribute {
    public function __construct() {
        parent::__construct('GET');
    }
}

#[Attribute(Attribute::TARGET_METHOD)]
class PostAttribute extends HttpMethodAttribute {
    public function __construct() {
        parent::__construct('POST');
    }
}

class ApiControllerAdvanced {
    #[Get("/users")]
    public function getUsers() {
        // Implementation
    }

    #[Post("/users")]
    public function createUser() {
        // Implementation
    }
}

// =============================================================================
// 9.3 CONDITIONAL ATTRIBUTES
// =============================================================================

#[Attribute(Attribute::TARGET_CLASS)]
class EnvironmentAttribute {
    public function __construct(public array $environments) {}
}

#[Environment(["development", "staging"])]
class DebugController {
    // Only available in development/staging
}

// =============================================================================
// 10. BEST PRACTICES AND PATTERNS
// =============================================================================

/**
 * Best Practices for PHP Attributes:
 *
 * 1. Use descriptive attribute names that indicate their purpose
 * 2. Keep attribute classes simple and focused
 * 3. Use appropriate target flags to restrict where attributes can be used
 * 4. Consider using IS_REPEATABLE for attributes that make sense to use multiple times
 * 5. Document your attributes with PHPDoc comments
 * 6. Use attribute constants for commonly used values
 * 7. Consider performance implications of reflection-based attribute reading
 * 8. Test your attribute implementations thoroughly
 * 9. Use attributes to separate concerns (validation, routing, etc.)
 * 10. Consider backward compatibility when introducing new attributes
 */

// =============================================================================
// 11. PERFORMANCE CONSIDERATIONS
// =============================================================================

/**
 * Performance Tips:
 *
 * 1. Cache attribute reflection results when possible
 * 2. Use attribute constants instead of strings for better performance
 * 3. Consider using compiled attribute readers for production
 * 4. Avoid reading attributes in performance-critical code paths
 * 5. Use lazy loading for attribute-based functionality
 */

// =============================================================================
// 12. COMPATIBILITY AND MIGRATION
// =============================================================================

/**
 * PHP Version Compatibility:
 * - Attributes are available since PHP 8.0
 * - Some features like IS_REPEATABLE require PHP 8.0+
 * - TARGET_ALL constant available since PHP 8.0
 *
 * Migration from DocBlock Annotations:
 * - Replace @annotations with #[Attribute] syntax
 * - Update reflection code to use getAttributes() instead of parsing docblocks
 * - Consider performance improvements from native attributes
 */

// =============================================================================
// 13. DEBUGGING AND DEVELOPMENT TOOLS
// =============================================================================

/**
 * Debugging Attributes:
 * - Use Reflection to inspect attributes at runtime
 * - Create attribute dumper utilities for development
 * - Use IDE support for attribute autocompletion
 * - Consider creating attribute validators
 */

function dumpAttributes(string $className): void {
    $reflection = new ReflectionClass($className);

    echo "Class: $className\n";
    echo "Attributes:\n";

    foreach ($reflection->getAttributes() as $attribute) {
        echo "  - {$attribute->getName()}\n";
        $instance = $attribute->newInstance();
        echo "    Arguments: " . json_encode($instance) . "\n";
    }

    echo "\nMethods:\n";
    foreach ($reflection->getMethods() as $method) {
        if (!empty($method->getAttributes())) {
            echo "  {$method->getName()}:\n";
            foreach ($method->getAttributes() as $attribute) {
                echo "    - {$attribute->getName()}\n";
            }
        }
    }
}

// Example usage:
// dumpAttributes(UserController::class);

// =============================================================================
// CONCLUSION
// =============================================================================

/**
 * PHP Attributes provide a powerful way to add metadata to your code.
 * They enable cleaner, more maintainable code by separating concerns
 * and providing a standardized way to configure behavior.
 *
 * Key takeaways:
 * - Attributes replace traditional docblock annotations
 * - Use Reflection API to read attributes at runtime
 * - Common use cases: routing, validation, DI, ORM mapping
 * - Consider performance and maintainability when designing attributes
 * - Test attribute implementations thoroughly
 * - Use appropriate target flags and repeatable settings
 */

?>
