<?php

// 🚀 Laravel 3.x Series (Released: 2012)

// Key Features:

// 1) **Artisan Command Line Interface (CLI)**
//    * Laravel 3.x introduced the Artisan CLI, a powerful tool to automate common tasks like database migrations and seeding.
//      php artisan migrate

// 2) **Resourceful Controllers**
//    * Laravel 3.x introduced resource controllers to simplify CRUD operations.
Route::resource('user', 'UserController');

// 3) **Eloquent ORM Enhancements**
//    * Laravel 3.x enhanced Eloquent ORM, adding features like eager loading and relationships management.
class Post extends Eloquent {
    public function comments() {
        return $this->hasMany('Comment');
    }
}

// 4) **Blade Templating Engine**
//    * Blade became more powerful with better control structures, and template inheritance.
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 3.x Example</title>
</head>
<body>
<h1>Welcome to Laravel 3.x</h1>
@foreach($posts as $post)
<p>{{ $post->title }}</p>
@endforeach
</body>
</html>

<?php

// 5) **Database Migrations**
//    * Laravel 3.x introduced database migrations to define and modify database schema using code.
// php artisan migrate

// 6) **Basic Authentication**
//    * The authentication system was expanded with features like login, logout, and basic user registration.
Route::get('/login', function() {
    return "Login Page";
});

// 7) **Middleware Support (Basic)**
//    * Laravel 3.x began introducing middleware to handle HTTP request filtering.
Route::filter('auth', function() {
    if (!Auth::check()) {
        return Redirect::to('login');
    }
});

// 8) **Advanced Validation System**
//    * Laravel 3.x introduced a more advanced validation system, supporting custom rules and multiple rules per field.
$validator = Validator::make(
    ['username' => 'John'],
    ['username' => 'required|min:5|max:15']
);
if ($validator->fails()) {
    echo "Validation failed!";
}

?>
