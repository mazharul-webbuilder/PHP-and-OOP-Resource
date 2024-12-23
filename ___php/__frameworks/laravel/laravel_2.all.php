<?php

// 🚀 Laravel 2.x Series (Released: 2011)

// Key Features:

// 1) **Enhanced Routing**
//    * Laravel 2.x improved routing with the ability to use named routes and dynamic parameters.
Route::get('/user/{id}', function($id) {
    return "User ID: " . $id;
});

// 2) **Improved Eloquent ORM**
//    * Laravel 2.x further improved the Eloquent ORM, adding relationships like `hasMany`, `belongsTo`, and others.
class Post extends Eloquent {
    public function user() {
        return $this->belongsTo('User');
    }
}

// 3) **Controllers**
//    * Controllers became more feature-rich, allowing for resourceful routing.
class UserController extends Controller {
    public function index() {
        return "User List";
    }

    public function show($id) {
        return "User ID: " . $id;
    }
}

// 4) **Blade Templating Engine Enhancements**
//    * Blade's features were enhanced in Laravel 2.x with more control structures and layout features.
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 2.x Example</title>
</head>
<body>
<h1>Welcome to Laravel 2.x</h1>
@foreach($users as $user)
<p>{{ $user->name }}</p>
@endforeach
</body>
</html>

<?php

// 5) **Basic Authentication System**
//    * Laravel 2.x introduced a simple authentication system to handle login/logout functionality.
Route::get('/login', function() {
    return "Login page";
});

// 6) **No Middleware for Authentication**
//    * Laravel 2.x did not fully implement middleware for handling authentication or other HTTP layers.
Route::get('/admin', array('before' => 'auth', function() {
    return "Admin Dashboard";
}));

// 7) **Dependency Injection (Basic)**
//    * Laravel 2.x started supporting basic dependency injection.
class PostController {
    protected $post;
    public function __construct(Post $post) {
        $this->post = $post;
    }
}

// 8) **Form Validation**
//    * Laravel 2.x enhanced form validation, with custom validation rules and messages.
$validator = Validator::make(
    ['email' => 'test@example.com'],
    ['email' => 'required|email']
);
if ($validator->fails()) {
    echo "Validation failed!";
}

?>
