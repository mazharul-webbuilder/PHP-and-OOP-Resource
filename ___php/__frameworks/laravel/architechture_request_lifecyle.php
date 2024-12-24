<?php

// Laravel Core Architecture and Request Lifecycle
// -------------------------------------------------------------
// Laravel's architecture is built around a modular and highly extensible structure. The framework ensures smooth handling of HTTP requests
// through a robust lifecycle mechanism. Below is a detailed explanation of how the core architecture works, including the Request Lifecycle,
// Service Container, Service Providers, Class Resolver, and other internal mechanisms.

// -------------------------------------------------------------
// 1) **Request Lifecycle**
// The request lifecycle is the core process that handles an incoming HTTP request and generates an HTTP response.

// Step-by-Step Request Lifecycle:
// -------------------------------------------------------------

// a) **Entry Point**
// The entry point for a Laravel application is the "public/index.php" file. This file initializes the application and handles the incoming request.
require __DIR__ . '/../bootstrap/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

// b) **HTTP Kernel**
// The HTTP Kernel manages the request lifecycle. It processes the incoming request and returns the response.
$app->make(Illuminate\Contracts\Http\Kernel::class)->handle(
    Illuminate\Http\Request::capture()
);

// c) **Service Providers Bootstrapping**
// The HTTP Kernel loads all configured service providers and bootstraps the application.
protected $bootstrappers = [
    Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables::class,
    Illuminate\Foundation\Bootstrap\LoadConfiguration::class,
    Illuminate\Foundation\Bootstrap\RegisterFacades::class,
    Illuminate\Foundation\Bootstrap\RegisterProviders::class,
    Illuminate\Foundation\Bootstrap\BootProviders::class,
];

// d) **Routing**
// After bootstrapping, the kernel resolves the route from the request URL. The route definition maps the request to a controller or closure.
Route::get('/example', function () {
    return 'Hello, Laravel!';
});

// e) **Middleware**
// Middleware filters the request through layers, such as authentication, logging, or CORS handling.
protected $middleware = [
    \App\Http\Middleware\TrustProxies::class,
    \Fruitcake\Cors\HandleCors::class,
    \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
];

// f) **Controller/Action Execution**
// The route resolves to a controller or closure. The controller action processes the request and prepares the response.
class ExampleController extends Controller {
    public function index() {
        return response()->json(['message' => 'This is an example response']);
    }
}

// g) **Response Generation**
// The response is sent back to the client using the Symfony HTTP foundation.
$response = $kernel->handle($request);
$response->send();

// -------------------------------------------------------------
// 2) **Service Container**
// The Service Container is a dependency injection mechanism that allows binding and resolving classes and interfaces.

// a) **Binding in the Service Container**
// You can bind interfaces to concrete implementations in the container.
$app->bind('ExampleInterface', function ($app) {
    return new ExampleImplementation();
});

// b) **Resolving from the Service Container**
// The container resolves instances automatically when dependencies are required.
class ExampleController {
    protected $example;

    public function __construct(ExampleInterface $example) {
        $this->example = $example;
    }
}

// c) **Singleton Bindings**
// Ensure that the same instance is returned every time.
$app->singleton('ExampleService', function ($app) {
    return new ExampleService();
});

// -------------------------------------------------------------
// 3) **Service Providers**
// Service Providers are central to bootstrapping a Laravel application. They register services and bindings in the service container.

// a) **Defining a Service Provider**
// Create a service provider class to register and boot services.
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ExampleServiceProvider extends ServiceProvider {
    public function register() {
        // Bind services into the container
        $this->app->bind('ExampleInterface', 'ExampleImplementation');
    }

    public function boot() {
        // Perform tasks during application bootstrapping
    }
}

// b) **Registering a Service Provider**
// Add the provider to the "config/app.php" file in the "providers" array.
'providers' => [
    App\Providers\ExampleServiceProvider::class,
];

// -------------------------------------------------------------
// 4) **Class Resolver**
// The Class Resolver dynamically resolves dependencies, controllers, and other components through the service container.

// a) **Resolving Controllers**
// The router uses the Class Resolver to resolve controllers and inject dependencies automatically.
Route::get('/example', [ExampleController::class, 'index']);

// b) **Resolving Middleware**
// Middleware dependencies are resolved from the container.
protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
];

// -------------------------------------------------------------
// 5) **Other Internal Mechanisms**

// a) **Facades**
// Laravel Facades provide a static interface to classes in the service container.
use Illuminate\Support\Facades\Cache;
Cache::put('key', 'value', 600);

// b) **Event Dispatcher**
// The event dispatcher allows for event-driven programming.
event(new ExampleEvent());

// c) **Queue System**
// Laravel queues provide asynchronous task execution.
\App\Jobs\ExampleJob::dispatch($data);

// d) **Task Scheduling**
// Define scheduled tasks in the "App\Console\Kernel" class.
protected function schedule(Schedule $schedule) {
    $schedule->command('example:command')->daily();
}

// -------------------------------------------------------------
// Conclusion:
// Laravel's core architecture combines a highly modular service container, service providers, and a streamlined request lifecycle.
// This design ensures flexibility, scalability, and maintainability for modern web applications.

?>
