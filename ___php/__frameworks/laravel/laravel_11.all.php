<?php

// Laravel 11.x Series (Released: 2024)
// -------------------------------------------------------------
// Laravel 11 continues to evolve with a focus on developer experience, streamlined workflows, and improved performance.
// Below is a comprehensive overview of the new features introduced in this version.

// -------------------------------------------------------------
// 1) **Streamlined Application Structure**
// Laravel 11 introduces a more minimalistic application skeleton, reducing boilerplate code and simplifying the directory structure.
// - Fewer default folders and files for a cleaner starting point.
// - Easier onboarding for new developers.

// -------------------------------------------------------------
// 2) **Health Check Endpoint**
// A new `/up` route is registered by default, providing a simple health check endpoint for your application.
Route::get('/up', function () {
    return response()->json(['status' => 'ok']);
});

// -------------------------------------------------------------
// 3) **Per-Second Rate Limiting**
// Laravel 11 introduces per-second rate limiting, allowing more granular control over request rates.

use Illuminate\Cache\RateLimiter;

RateLimiter::for('api', function (RateLimiter $rateLimiter) {
    return $rateLimiter->by('user-api')->every(1)->max(10); // 10 requests per second
});

// -------------------------------------------------------------
// 4) **Optional API and Broadcasting Scaffolding**
// API routes and broadcasting are no longer included by default. Install them as needed using Artisan commands:
// - php artisan install:api
// - php artisan install:broadcasting

// -------------------------------------------------------------
// 5) **Default Testing Framework: Pest**
// Laravel 11 adopts Pest as the default testing framework, offering a more expressive and elegant syntax for writing tests.

it('has a health check endpoint', function () {
    $response = $this->get('/up');
    $response->assertStatus(200);
});

// -------------------------------------------------------------
// 6) **Default Database: SQLite**
// The default database connection is now SQLite, simplifying local development setups.
// Configure in your `.env` file:
// DB_CONNECTION=sqlite
// DB_DATABASE=:memory:

// -------------------------------------------------------------
// 7) **New Artisan Commands**
// New `make:` Artisan commands are introduced for generating enums, interfaces, and classes.
// Examples:
// - php artisan make:enum Status
// - php artisan make:interface UserRepositoryInterface
// - php artisan make:class UserService

// -------------------------------------------------------------
// 8) **Removed Configuration Files**
// Several configuration files have been removed to streamline the configuration process.
// Publish them manually if needed:
// - php artisan config:publish auth
// - php artisan config:publish database

// -------------------------------------------------------------
// 9) **Improved Debugging with Dumpable Trait**
// The `Dumpable` trait allows you to use `dd()` and `dump()` methods within your classes for better debugging.

use Illuminate\Support\Traits\Dumpable;

class User
{
    use Dumpable;

    public $name;
    public $email;
}

// Example Usage:
$user = new User();
$user->name = 'John Doe';
$user->email = 'john@example.com';
$user->dd(); // Outputs and terminates the script.

// -------------------------------------------------------------
// 10) **Simplified Configuration Management**
// Configuration is now primarily managed through the `.env` file, reducing the need for multiple configuration files.
// Example `.env` entries:
// APP_NAME=Laravel
// APP_ENV=local
// APP_KEY=base64:...
// APP_DEBUG=true
// APP_URL=http://localhost

// -------------------------------------------------------------
// Conclusion:
// Laravel 11.x introduces meaningful updates that focus on productivity, flexibility, and modern development practices.
// This version simplifies configuration, enhances debugging, and provides tools for more efficient testing and development workflows.

?>
