<?php

// 🚀 Laravel 1.x Series (Released: 2011)

// Key Features:

// 1) **Basic Routing**
//    * Laravel 1.x introduced routing functionality to map HTTP requests to specific controller actions.
Route::get('/', function() {
    return "Welcome to Laravel 1.x!";
});

// 2) **Basic MVC Structure**
//    * Laravel 1.x implemented the basic MVC (Model-View-Controller) structure to organize code.
class UserController extends Controller {
    public function show($id) {
        return view('user.show', ['id' => $id]);
    }
}

// 3) **Basic Eloquent ORM (Object-Relational Mapping)**
//    * Introduced the Eloquent ORM for simple database interaction with models.
class User extends Eloquent {
    protected $table = 'users';
}

// 4) **Blade Templating Engine** (Basic Version)
//    * The Blade templating engine was introduced for separating the logic from presentation.
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 1.x Example</title>
</head>
<body>
<h1>Welcome to Laravel</h1>
<p>{{ $message }}</p>
</body>
</html>

<?php

// 5) **No Middleware Support**
//    * Laravel 1.x did not have built-in middleware for handling HTTP requests before they reach routes.
Route::get('/profile', function() {
    return "User Profile Page";
});

// 6) **No Artisan Command Line Interface (CLI)**
//    * Laravel 1.x did not include the Artisan CLI, which was introduced in later versions for managing tasks.
echo "Laravel 1.x does not include Artisan CLI.";

// 7) **No Dependency Injection**
//    * Dependency Injection wasn't a major part of Laravel 1.x.
class UserController1 {
    protected $user;
    public function __construct() {
        $this->user = new User();
    }
}

// 8) **Basic Validation**
//    * Simple form validation was available but very basic.
$rules = ['username' => 'required'];
$validator = Validator::make(['username' => 'Alice'], $rules);
if ($validator->fails()) {
    echo "Validation failed!";
}

?>
