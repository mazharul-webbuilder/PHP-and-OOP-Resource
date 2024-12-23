<?php

// 🚀 Laravel 4.x Series (Released: 2013)

// Key Features:

// 1) **Composer Dependency Management**
//    * Laravel 4.x integrated Composer for managing packages and dependencies.
composer install

// 2) **Service Providers**
//    * Service providers were introduced to handle application bootstrapping and configuration.
class AppServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind('SomeService', function() {
            return new SomeService();
        });
    }
}

// 3) **Facades**
//    * Laravel 4.x introduced facades to provide a simpler syntax for accessing services.
use Illuminate\Support\Facades\DB;

DB::table('users')->get();

// 4) **Blade Templating Enhancements**
//    * Blade introduced @include and @extends for template inheritance and component inclusion.
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 4.x Example</title>
</head>
<body>
<h1>Welcome to Laravel 4.x</h1>
@include('partials.header')
@yield('content')
</body>
</html>

<?php

// 5) **Database Migrations and Seeding**
//    * Laravel 4.x enhanced migrations and introduced seeding for populating the database with test data.
php artisan db:seed

// 6) **RESTful Routing and Controllers**
//    * Laravel 4.x expanded RESTful controllers with better routing and action handling.
Route::resource('post', 'PostController');

// 7) **Queue System**
//    * Laravel 4.x introduced the queue system to handle deferred tasks such as sending emails.
Queue::push('SendEmail', ['user' => $user]);

// 8) **Advanced Validation**
//    * Laravel 4.x enhanced the validation system with more options, like custom validation messages and rules.
$validator = Validator::make(
    ['email' => 'test@example.com'],
    ['email' => 'required|email|unique:users,email']
);
if ($validator->fails()) {
    echo "Validation failed!";
}

?>
