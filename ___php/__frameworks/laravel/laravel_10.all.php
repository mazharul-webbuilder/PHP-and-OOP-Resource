<?php

// Laravel 10.x Series (Released: 2023)
// -------------------------------------------------------------
// Laravel 10 brings several advancements, focusing on PHP 8.2+ support, developer experience, and performance improvements.
// Below is a comprehensive overview of the key features introduced in this version.

// -------------------------------------------------------------
// 1) **PHP 8.2+ Support**
// Laravel 10.x requires PHP 8.2 or higher, leveraging features like readonly properties and disjunctive normal form types.
class User {
    public readonly string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }
}

// -------------------------------------------------------------
// 2) **Laravel Query Builder Enhancements**
// Advanced query builder features, like improved `join` support and enhanced query macros, were introduced.
$posts = Post::query()->join('categories', 'posts.category_id', '=', 'categories.id')->get();

// -------------------------------------------------------------
// 3) **Enhanced Artisan Commands**
// New and improved Artisan commands provide more advanced options for common tasks.
// Examples:
// - php artisan make:observer PostObserver
// - php artisan make:listener UserEventListener

// -------------------------------------------------------------
// 4) **Automatic Route Caching**
// Laravel 10.x includes automatic route caching during deployment for better production performance.
// Command:
// php artisan route:cache

// -------------------------------------------------------------
// 5) **Improved Eloquent Collections**
// Enhanced `when` and `filter` methods make Eloquent collections more efficient.
$users = User::all()->filter(fn($user) => $user->isActive());

// -------------------------------------------------------------
// 6) **Built-in HTTP Client Mocking**
// Laravel 10.x provides a more robust way to mock HTTP requests in tests.
use Illuminate\Support\Facades\Http;

Http::fake([
    'api.example.com/*' => Http::response(['data' => 'test'], 200),
]);

// -------------------------------------------------------------
// 7) **Query Builder Performance Improvements**
// Performance improvements in the query builder make working with large datasets more efficient.
$users = User::where('status', 'active')->chunk(100, function ($chunk) {
    // Process each chunk
});

// -------------------------------------------------------------
// 8) **Job and Queue Improvements**
// Enhanced job handling and queueing, including job retries and improved failure handling.
use App\Jobs\SendEmail;

SendEmail::dispatch()->onQueue('emails');

// -------------------------------------------------------------
// 9) **Enhanced Blade Directives**
// New directives like `@error` and improved `@isset` enhance Blade templating.
//@isset($user)
//    <p>{{ $user->name }}</p>
//@endisset

// -------------------------------------------------------------
// 10) **Improved Testing Features**
// Includes better assertions, easier database seeding in tests, and improved mock support.
$this->assertDatabaseMissing('posts', ['title' => 'Old Post']);

// -------------------------------------------------------------
// 11) **Automatic Model Binding for More Complex Types**
// Supports automatic model binding for `Enum` and `UUID` types.
Route::get('/status/{status}', function (UserStatus $status) {
    // Automatically resolve Enum
});

// -------------------------------------------------------------
// 12) **Improved Exception Handling**
// Laravel 10.x enhances exception handling with more meaningful error messages for debugging.
try {
    // Some code that might fail
} catch (\Exception $e) {
    report($e);
    return response()->json(['error' => $e->getMessage()], 500);
}

// -------------------------------------------------------------
// Conclusion:
// Laravel 10.x continues to refine the framework with modern PHP features, performance optimizations, and improved developer tooling.
// These updates ensure a smoother, more efficient workflow for Laravel developers.

?>
