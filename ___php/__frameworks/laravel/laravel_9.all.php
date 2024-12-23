<?php

// 🚀 Laravel 9.x Series (Released: 2022)

// Key Features:

// 1) **Symfony Mailer Integration**
//    * Laravel 9.x integrated Symfony Mailer as the default email sending service, replacing SwiftMailer.
use Symfony\Component\Mime\Email;
use Illuminate\Support\Facades\Mail;

Mail::send(new Email());  // Sending an email using Symfony Mailer

// 2) **Laravel Breeze for Authentication**
//    * Laravel 9.x introduced Laravel Breeze as a simple and minimal authentication scaffold.
//      composer require laravel/breeze --dev
//      php artisan breeze:install

// 3) **Full Text Search for Eloquent**
//    * Laravel 9.x introduced full-text search for Eloquent models, allowing more efficient searches.
Post::whereFullText('content', 'Laravel')->get();

// 4) **Improved Query Builder**
//    * Laravel 9.x added more advanced query builder methods like `whereHas` for relations and other improvements.
User::whereHas('posts', function ($query) {
    $query->where('status', 'published');
})->get();

// 5) **Query Parameter Casting**
//    * Laravel 9.x added automatic casting of query parameters to appropriate types, improving database query handling.
$posts = Post::where('created_at', '>', now())->get();

// 6) **Controller Route Caching**
//    * Laravel 9.x improved route caching for controller-based routes, making the application faster.
//      php artisan route:cache

// 7) **PHP 8.1+ Features**
//    * Laravel 9.x required PHP 8.1+ and added support for features like enumerations, fibers, and intersection types.
enum UserStatus: string {
    case Active = 'active';
    case Inactive = 'inactive';
}

// 8) **Database Factory Seeding**
//    * Laravel 9.x improved model factory seeding, allowing for better structure and more powerful factory definitions.
Post::factory(10)->create();

// 9) **Database Migrations Speed Improvements**
//    * Laravel 9.x introduced speed improvements for database migrations, making them run faster and more efficiently.
//  php artisan migrate

// 10) **Enhanced Test Coverage**
//    * Laravel 9.x introduced improved testing features, including better coverage of HTTP testing and test assertions.
$this->assertDatabaseHas('users', ['email' => 'test@example.com']);

?>
