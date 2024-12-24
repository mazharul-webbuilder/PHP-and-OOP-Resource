<?php

// Laravel 1.x Overview (Released: 2011)
// -------------------------------------------------------------
// Laravel 1.x marked the beginning of one of the most popular PHP frameworks today.
// It provided basic tools and functionality that laid the foundation for the robust framework Laravel has become.
// Below are the key features, limitations, and details of Laravel 1.x:

// -------------------------------------------------------------
// 1) **Basic Routing**
// Laravel 1.x introduced the ability to define routes to handle HTTP requests.
// These routes mapped requests to closures or controller actions, making URL handling simple and intuitive.

Route::get('/', function () {
    return "Welcome to Laravel 1.x!";
});

Route::get('/about', function () {
    return "About Laravel 1.x";
});

// -------------------------------------------------------------
// 2) **Basic MVC Structure**
// Laravel 1.x implemented the foundational Model-View-Controller (MVC) architecture,
// separating application logic, user interface, and data storage for better organization.

class UserController extends Controller
{
    public function show($id)
    {
        // Access the User model and pass data to the view
        $user = User::find($id);
        return view('user.show', ['user' => $user]);
    }
}

// -------------------------------------------------------------
// 3) **Basic Eloquent ORM (Object-Relational Mapping)**
// Laravel 1.x introduced Eloquent ORM, simplifying database interactions by using models to represent database tables.

class User extends Eloquent
{
    protected $table = 'users';
    protected $fillable = ['name', 'email'];

    // Example of using Eloquent to query the database
    public static function getActiveUsers()
    {
        return self::where('active', 1)->get();
    }
}

// -------------------------------------------------------------
// 4) **Blade Templating Engine (Basic Version)**
// Laravel 1.x included a rudimentary version of the Blade templating engine,
// which allowed dynamic content injection and template inheritance.
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 1.x Example</title>
</head>
<body>
<h1>Welcome to Laravel</h1>
<p>{{ $message }}</p>

{{-- Example of conditional statements in Blade --}}
@if ($user->active)
<p>User is active.</p>
@else
<p>User is inactive.</p>
@endif
</body>
</html>
<?php

// -------------------------------------------------------------
// 5) **Validation**
// Laravel 1.x provided basic validation capabilities for forms and user input.
$rules = ['username' => 'required|min:3'];
$validator = Validator::make(['username' => 'Al'], $rules);
if ($validator->fails()) {
    echo "Validation failed: " . implode(', ', $validator->errors()->all());
} else {
    echo "Validation passed.";
}

// -------------------------------------------------------------
// 6) **Missing Features in Laravel 1.x**
// Laravel 1.x was a foundational release but lacked many features we take for granted in modern Laravel:

// a) **No Middleware Support**
// Middleware for request filtering and processing was introduced in later versions. Routes were simple and did not have pre-processing layers.
Route::get('/profile', function () {
    return "User Profile Page";
});

// b) **No Artisan Command Line Interface (CLI)**
// The Artisan CLI, which provides tools for task automation like migrations, was introduced in Laravel 3.0.
echo "Laravel 1.x does not include Artisan CLI.";

// c) **No Dependency Injection**
// Dependency injection, a key feature for decoupling, was not available in Laravel 1.x.
class UserController1
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }
}

// d) **No Event Handling**
// Event handling was not part of Laravel 1.x, making it less modular for reactive programming.

// e) **No Package Management Support**
// Package management tools like Composer were not integrated, limiting extensibility.

// f) **No Migration System**
// Database schema management using migrations was absent in Laravel 1.x.

// -------------------------------------------------------------
// 7) **Limitations in Routing**
// While Laravel 1.x introduced routing, it lacked advanced features like route groups, middlewares, or named routes.

// -------------------------------------------------------------
// 8) **Basic Authentication**
// Authentication in Laravel 1.x was primitive and lacked built-in scaffolding.

// Example of a basic login check (custom implementation):
function login($username, $password)
{
    $user = User::where('username', $username)->where('password', md5($password))->first();
    if ($user) {
        echo "Login successful.";
    } else {
        echo "Invalid credentials.";
    }
}

// -------------------------------------------------------------
// Conclusion:
// Laravel 1.x laid the groundwork for what would become a leading PHP framework. While it lacked many features, its focus on simplicity,
// routing, basic MVC, and the introduction of Eloquent ORM helped developers adopt modern development practices.

?>
