<?php

// 🚀 Laravel 10.x Series (Released: 2023)

// Key Features:

// 1) **PHP 8.2+ Support**
//    * Laravel 10.x requires PHP 8.2 or higher, taking advantage of new features such as readonly properties, and disjunctive normal form types.
class User {
    public readonly string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }
}

// 2) **Laravel Query Builder Enhancements**
//    * Laravel 10.x introduced advanced query builder features, like improved `join` support and enhanced query macros.
$posts = Post::query()->join('categories', 'posts.category_id', '=', 'categories.id')->get();

// 3) **Enhanced Artisan Commands**
//    * New and improved Artisan commands, including `make:command`, `make:observer`, and `make:listener` with more advanced options.
php artisan make:observer PostObserver
php artisan make:listener UserEventListener

// 4) **Automatic Route Caching**
//    * Laravel 10.x includes automatic route caching when deploying, improving performance in production environments.
php artisan route:cache

// 5) **Improved Eloquent Collections**
//    * Laravel 10.x includes better handling and features for Eloquent collections, such as `when` and `filter` methods being more efficient.
$users = User::all()->filter(fn($user) => $user->isActive());

// 6) **Built-in HTTP Client Mocking**
//    * Laravel 10.x provides an improved way to mock HTTP requests in tests, allowing better simulation of API responses.
use Illuminate\Support\Facades\Http;

Http::fake([
    'api.example.com/*' => Http::response(['data' => 'test'], 200),
]);

// 7) **Query Builder Performance Improvements**
//    * Laravel 10.x improved performance of the query builder, making it more efficient when working with large datasets.
$users = User::where('status', 'active')->chunk(100, function ($chunk) {
    // Process each chunk
});

// 8) **Job and Queue Improvements**
//    * Laravel 10.x enhanced job handling and queues, with features like job retries and better failure handling.
use App\Jobs\SendEmail;

SendEmail::dispatch()->onQueue('emails');

// 9) **Enhanced Blade Directives**
//    * New Blade directives, such as `@error` and `@isset`, were enhanced for more powerful templating capabilities.
@isset($user)
    <p>{{ $user->name }}</p>
@endisset

// 10) **Improved Testing Features**
//    * Laravel 10.x includes improvements for testing, including more powerful assertions, easier database seeding in tests, and better mock support.
$this->assertDatabaseMissing('posts', ['title' => 'Old Post']);

// 11) **Automatic Model Binding for More Complex Types**
//    * Laravel 10.x allows automatic model binding for more complex types such as `Enum` and `UUID`.
Route::get('/status/{status}', function (UserStatus $status) {
    // Automatically resolve Enum
});

// 12) **Improved Exception Handling**
//    * Laravel 10.x introduced better exception handling, providing more meaningful error messages for debugging.
try {
    // Some code that might fail
} catch (\Exception $e) {
    report($e);
    return response()->json(['error' => $e->getMessage()], 500);
}

?>
