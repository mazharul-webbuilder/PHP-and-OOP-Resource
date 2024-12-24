<?php

// Laravel 9.x Series (Released: 2022)
// -------------------------------------------------------------
// Laravel 9 brings significant enhancements, emphasizing modern PHP features, developer productivity, and efficient performance.
// Below is a detailed overview of the key features in Laravel 9.x.

// -------------------------------------------------------------
// 1) **Symfony Mailer Integration**
// Laravel 9.x replaces SwiftMailer with Symfony Mailer for email handling.
use Symfony\Component\Mime\Email;
use Illuminate\Support\Facades\Mail;

Mail::send(new Email());  // Sending an email using Symfony Mailer

// -------------------------------------------------------------
// 2) **Laravel Breeze for Authentication**
// Laravel Breeze offers a simple and minimal authentication scaffold.
// Installation Commands:
// composer require laravel/breeze --dev
// php artisan breeze:install

// -------------------------------------------------------------
// 3) **Full Text Search for Eloquent**
// Introduced full-text search capabilities for Eloquent models, enhancing search efficiency.
Post::whereFullText('content', 'Laravel')->get();

// -------------------------------------------------------------
// 4) **Improved Query Builder**
// Advanced query builder methods, including `whereHas` for relationships.
User::whereHas('posts', function ($query) {
    $query->where('status', 'published');
})->get();

// -------------------------------------------------------------
// 5) **Query Parameter Casting**
// Automatically casts query parameters to appropriate types, improving database interactions.
$posts = Post::where('created_at', '>', now())->get();

// -------------------------------------------------------------
// 6) **Controller Route Caching**
// Improved route caching for controller-based routes, enhancing application performance.
// Command:
// php artisan route:cache

// -------------------------------------------------------------
// 7) **PHP 8.1+ Features**
// Requires PHP 8.1+ and supports features like enumerations, fibers, and intersection types.
enum UserStatus: string {
    case Active = 'active';
    case Inactive = 'inactive';
}

// -------------------------------------------------------------
// 8) **Database Factory Seeding**
// Enhanced model factory seeding for better structure and functionality.
Post::factory(10)->create();

// -------------------------------------------------------------
// 9) **Database Migrations Speed Improvements**
// Optimized database migrations for faster execution.
// Command:
// php artisan migrate

// -------------------------------------------------------------
// 10) **Enhanced Test Coverage**
// Improved testing features, including better HTTP testing and test assertions.
$this->assertDatabaseHas('users', ['email' => 'test@example.com']);

// -------------------------------------------------------------
// Conclusion:
// Laravel 9.x continues to innovate by adopting modern PHP standards, improving developer tools, and providing robust features for building scalable applications.

?>
