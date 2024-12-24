<?php

// Laravel 2.x Overview (Released: 2011)
// -------------------------------------------------------------
// Laravel 2.x built upon the foundation of Laravel 1.x and introduced a range of enhancements
// that further solidified its position as a promising PHP framework. Below is a detailed
// explanation of its key features and improvements.

// -------------------------------------------------------------
// 1) **Enhanced Routing**
// Laravel 2.x expanded the routing system with named routes and dynamic parameters.
Route::get('/user/{id}', function($id) {
    return "User ID: " . $id;
});

// Named routes example:
Route::get('profile', array('as' => 'profile', function() {
    return "This is the user profile page.";
}));

// To generate a URL for a named route:
echo route('profile'); // Output: http://example.com/profile

// -------------------------------------------------------------
// 2) **Improved Eloquent ORM**
// Relationships were introduced in the Eloquent ORM, allowing developers to define model associations.

class Post extends Eloquent {
    // Define a "belongsTo" relationship
    public function user() {
        return $this->belongsTo('User');
    }

    // Define a "hasMany" relationship
    public function comments() {
        return $this->hasMany('Comment');
    }
}

class User extends Eloquent {
    public function posts() {
        return $this->hasMany('Post');
    }
}

// Usage example:
$user = User::find(1);
foreach ($user->posts as $post) {
    echo $post->title;
}

// -------------------------------------------------------------
// 3) **Controllers**
// Laravel 2.x introduced more powerful controllers, enabling resourceful routing.

class UserController extends Controller {
    // Display a list of users
    public function index() {
        return "User List";
    }

    // Display a specific user by ID
    public function show($id) {
        return "User ID: " . $id;
    }
}

// Resourceful routing example:
Route::controller('users', 'UserController');

// -------------------------------------------------------------
// 4) **Blade Templating Engine Enhancements**
// Blade templates gained additional features like extended control structures and layouts.
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 2.x Example</title>
</head>
<body>
<h1>Welcome to Laravel 2.x</h1>

{{-- Blade example with control structures --}}
@foreach($users as $user)
<p>{{ $user->name }}</p>
@endforeach

{{-- Blade layout example --}}
@section('content')
<p>This is the main content.</p>
@endsection
</body>
</html>
<?php

// -------------------------------------------------------------
// 5) **Basic Authentication System**
// Laravel 2.x introduced a basic authentication system, simplifying login and logout processes.

Route::get('/login', function() {
    return "Login Page";
});

Route::post('/login', function() {
    $credentials = Input::only('email', 'password');
    // Basic authentication logic
    if (Auth::attempt($credentials)) {
        return "Logged in successfully.";
    }
    return "Invalid credentials.";
});

Route::get('/logout', function() {
    Auth::logout();
    return "Logged out successfully.";
});

// -------------------------------------------------------------
// 6) **No Middleware for Authentication**
// While middleware wasn’t fully implemented, Laravel 2.x used filters for basic request pre-processing.
Route::get('/admin', array('before' => 'auth', function() {
    return "Admin Dashboard";
}));

// Example of a filter definition:
Route::filter('auth', function() {
    if (!Auth::check()) {
        return Redirect::to('login');
    }
});

// -------------------------------------------------------------
// 7) **Dependency Injection (Basic)**
// Laravel 2.x began supporting basic dependency injection, allowing objects to be passed as dependencies.

class PostController {
    protected $post;

    // Inject the Post model
    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function index() {
        return $this->post->all();
    }
}

// -------------------------------------------------------------
// 8) **Form Validation**
// Laravel 2.x enhanced form validation with custom rules and error messages.

$validator = Validator::make(
    ['email' => 'test@example.com'], // Input data
    ['email' => 'required|email']   // Validation rules
);

if ($validator->fails()) {
    echo "Validation failed! Errors: ";
    print_r($validator->errors()->all());
} else {
    echo "Validation passed.";
}

// -------------------------------------------------------------
// Conclusion:
// Laravel 2.x introduced significant improvements over its predecessor, including enhanced routing,
// a more powerful Eloquent ORM, resourceful controllers, and better form validation.
// These features laid the groundwork for even more advanced capabilities in future versions.

?>
