<?php

// 🚀 Laravel 7.x Series (Released: 2020)
// -------------------------------------------------------------
// Laravel 7 introduced significant improvements, focusing on developer experience, security, and performance.
// Below is a detailed overview of the key features introduced in this version.

// -------------------------------------------------------------
// 1) **Blade Component Class Support**
// Laravel 7.x enabled Blade components to be backed by PHP classes, making it easier to manage component-specific logic.
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

// Usage in Blade template:
?>
<x-alert type="success" message="Operation successful!" />
<?php

// -------------------------------------------------------------
// 2) **Laravel Sanctum for API Authentication**
// Laravel 7.x introduced Sanctum, a lightweight authentication package for APIs, Single Page Applications, and simple token-based authentication.
// Installation:
// composer require laravel/sanctum
// php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

// -------------------------------------------------------------
// 3) **Custom Eloquent Casts**
// Laravel 7.x introduced custom Eloquent casts, allowing complex data transformations to be seamlessly handled.
class User extends Eloquent {
    protected $casts = [
        'preferences' => 'array',  // Automatically cast JSON data to array
    ];
}

// -------------------------------------------------------------
// 4) **HTTP Client Improvements**
// A new HTTP client built on Guzzle simplifies API requests with an expressive API.
use Illuminate\Support\Facades\Http;

$response = Http::get('https://api.example.com/posts');
$data = $response->json(); // Access the JSON response data

// -------------------------------------------------------------
// 5) **Model Factory Classes**
// Laravel 7.x replaced the old model factories with class-based factories, improving test data management.
use App\Models\User as User2;
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

// -------------------------------------------------------------
// 6) **Route Caching Improvements**
// Optimized route caching for faster application performance, especially in production environments.
// Command:
// php artisan route:cache

// -------------------------------------------------------------
// 7) **Improved CORS Support**
// Laravel 7.x enhanced CORS (Cross-Origin Resource Sharing) support to better handle API requests from different origins.
// Installation:
// composer require barryvdh/laravel-cors
// Configuration file available at `config/cors.php`

// -------------------------------------------------------------
// 8) **Blade "X" Directive for Components**
// The "X" directive provides a concise syntax for rendering Blade components.
?>
<x-alert type="success" message="Data saved successfully!" />
<?php

// -------------------------------------------------------------
// 9) **Database Schema Dumping**
// Laravel 7.x introduced schema dumping to save database schema as SQL files, useful for version control and faster migrations.
// Command:
// php artisan schema:dump

// -------------------------------------------------------------
// Conclusion:
// Laravel 7.x brought significant improvements in authentication, Blade components, data handling, and developer tooling.
// These enhancements ensured better performance and productivity for developers.

?>
