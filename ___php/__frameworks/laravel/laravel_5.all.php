<?php

// 🚀 Laravel 5.x Series (Released: 2015)
// -------------------------------------------------------------
// Laravel 5.x introduced significant changes, focusing on PSR standards, middleware, enhanced templating, and robust API and background task handling.
// Below are its standout features:

// -------------------------------------------------------------
// 1) **PSR-4 Autoload and Namespacing**
// Laravel 5.x adopted the PSR-4 autoload standard, improving the organization and structure of classes.
namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
}

// -------------------------------------------------------------
// 2) **Middleware**
// Middleware was introduced to handle HTTP requests globally or on a per-route basis.
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return view('profile'); // Access restricted to authenticated users
    });
});

// -------------------------------------------------------------
// 3) **Artisan Command Enhancements**
// New Artisan commands were introduced to simplify development tasks, such as creating controllers, models, and migrations.
// Commands:
// php artisan make:controller UserController
// php artisan make:model User
// php artisan make:migration create_users_table

// -------------------------------------------------------------
// 4) **Eloquent API Resources**
// API resources provided a convenient way to transform data into JSON for APIs.
use App\Http\Resources\UserResource;

Route::get('/users', function () {
    return UserResource::collection(User::all()); // Transform users into API-friendly data
});

// -------------------------------------------------------------
// 5) **Form Request Validation**
// Validation logic was separated into form request classes, improving code clarity and reuse.
use Illuminate\Foundation\Http\FormRequest;

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

// -------------------------------------------------------------
// 6) **Blade Templating Enhancements**
// Blade added features like `@yield`, `@section`, `@foreach`, and `@component` for reusable and maintainable templates.
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.x Example</title>
</head>
<body>
<h1>Welcome to Laravel 5.x</h1>
@component('components.alert')
<strong>Success!</strong> Your profile has been updated.
@endcomponent
</body>
</html>
<?php

// -------------------------------------------------------------
// 7) **Task Scheduling**
// A task scheduling feature was introduced, allowing developers to schedule periodic tasks via Artisan.
use Illuminate\Console\Scheduling\Schedule;

$schedule->command('inspire')->hourly(); // Schedule the "inspire" command to run every hour

// -------------------------------------------------------------
// 8) **Job and Queue System Enhancements**
// The job and queue system was enhanced for managing background tasks like sending emails.
use App\Jobs\SendWelcomeEmail;

$user = User::find(1);
dispatch(new SendWelcomeEmail($user)); // Dispatch a job to send a welcome email

// -------------------------------------------------------------
// 9) **Localization**
// Localization was introduced for building multi-language applications.
__('messages.welcome'); // Translate the 'welcome' message based on the current locale

// -------------------------------------------------------------
// 10) **Events and Broadcasting**
// Laravel 5.x improved event broadcasting for real-time updates via WebSockets.
use App\Events\UserLoggedIn;

$user = User::find(1);
event(new UserLoggedIn($user)); // Broadcast an event when a user logs in

// -------------------------------------------------------------
// Conclusion:
// Laravel 5.x set the foundation for modern Laravel applications with its adoption of PSR standards, middleware, advanced task scheduling, and robust API support.
// These features established Laravel as a go-to framework for web application development.

?>
