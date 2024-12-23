<?php

// 🚀 Laravel 7.x Series (Released: 2020)

// Key Features:

// 1) **Blade Component Class Support**
//    * Laravel 7.x allowed Blade components to be backed by classes, offering greater flexibility for handling component logic.

use Illuminate\View\Component;

class Alert extends Component {
    public $type;
    public $message;

    public function __construct($type, $message) {
        $this->type = $type;
        $this->message = $message;
    }

    public function render() {
        return view('components.alert');
    }
}

// 2) **Laravel Sanctum for API Authentication**
//    * Laravel 7.x introduced Sanctum for simple token-based API authentication.

//  composer require laravel/sanctum
//  php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

// 3) **Custom Eloquent Casts**
//    * Laravel 7.x introduced custom Eloquent casts to handle complex data transformations.
class User extends Eloquent {
    protected $casts = [
        'preferences' => 'array',  // Custom cast to handle JSON data
    ];
}

// 4) **HTTP Client Improvements**
//    * Laravel 7.x introduced a new HTTP client based on Guzzle, offering a simpler API for making HTTP requests.

$response = Http::get('https://api.example.com/posts');
$data = $response->json();

// 5) **Model Factory Classes**
//    * Laravel 7.x replaced the old model factories with class-based factories for better flexibility and organization.
use App\Models\User2;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory {
    protected $model = User::class;

    public function definition() {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}

// 6) **Route Caching Improvements**
//    * Laravel 7.x optimized route caching for faster application bootstrapping.
//  php artisan route:cache

// 7) **Improved CORS Support**
//    * Laravel 7.x improved CORS (Cross-Origin Resource Sharing) handling for better API support.
//      composer require barryvdh/laravel-cors
//      Configuration available in config/cors.php

// 8) **Blade "X" Directive for Components**
//    * Laravel 7.x introduced the "X" directive for rendering Blade components in a more concise manner.
//    <x-alert type="success" message="Data saved successfully!"/>

// 9) **Database Schema Dumping**
//    * Laravel 7.x allowed schema dumping for databases, making it easier to manage schema in source control.
// php artisan schema:dump

?>
