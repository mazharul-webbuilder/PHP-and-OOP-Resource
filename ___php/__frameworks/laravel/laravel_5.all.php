<?php

// 🚀 Laravel 5.x Series (Released: 2015)

// Key Features:

// 1) **PSR-4 Autoload and Namespacing**
//    * Laravel 5.x adopted PSR-4 autoload standard, allowing for better organization and namespacing of classes.
namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
}

// 2) **Middleware**
//    * Laravel 5.x introduced global and route-specific middleware, improving HTTP request handling.
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    });
});

// 3) **Artisan Command Enhancements**
//    * Artisan commands were improved with new features like `make:controller`, `make:model`, and `make:migration`.
//      php artisan make:controller UserController
//      php artisan make:model User
//      php artisan make:migration create_users_table

// 4) **Eloquent API Resources**
//    * Laravel 5.x introduced API resources to easily transform data for APIs.
use App\Http\Resources\UserResource;

Route::get('/users', function () {
    return UserResource::collection(User::all());
});

// 5) **Form Request Validation**
//    * Form request validation was introduced to separate validation logic from controller actions.
class StoreUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
        ];
    }
}

// 6) **Blade Templating Enhancements**
//    * Blade added more powerful features such as @yield, @section, @foreach, and @component for reusable layouts.
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.x Example</title>
</head>
<body>
<h1>Welcome to Laravel 5.x</h1>
@component('components.alert')
<strong>Success!</strong>
Your profile has been updated.
@endcomponent
</body>
</html>

<?php

// 7) **Task Scheduling**
//    * Laravel 5.x introduced task scheduling, allowing periodic tasks to be managed via Artisan.
$schedule = 'test';
$schedule->command('inspire')->hourly();

// 8) **Job and Queue System Enhancements**
//    * Laravel 5.x introduced a powerful job and queue system, making background task management easier.
$user = 'a user';
dispatch(new SendWelcomeEmail($user));

// 9) **Localization**
//    * Laravel 5.x introduced localization features for better internationalization support.
__('messages.welcome');

// 10) **Events and Broadcasting**
//    * Laravel 5.x enhanced event broadcasting, allowing real-time updates via WebSockets.
event(new UserLoggedIn($user));

?>
