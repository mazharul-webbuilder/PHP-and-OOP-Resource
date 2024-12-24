<?php

// 🚀 Laravel 8.x Series (Released: 2020)
// -------------------------------------------------------------
// Laravel 8 introduced significant enhancements to the framework, focusing on developer productivity, flexibility, and modern tools.
// Below is a comprehensive overview of the key features introduced in this version.

// -------------------------------------------------------------
// 1) **Laravel Jetstream for Authentication and Scaffolding**
// Laravel 8.x introduced Jetstream, a modern application scaffolding tool that replaced the older Laravel UI package.
// Jetstream supports advanced features like:
// - Authentication
// - Registration
// - Two-Factor Authentication
// - Session Management
// - API Token Management
// Installation Commands:
// composer require laravel/jetstream
// php artisan jetstream:install livewire  // or inertia

// -------------------------------------------------------------
// 2) **Dynamic Blade Components**
// Blade components became more dynamic, allowing attributes to be passed and reused flexibly in templates.
?>
<x-alert :type="$type" :message="$message" />
<?php

// -------------------------------------------------------------
// 3) **Model Factory Improvements**
// Model factories were revamped to be class-based, improving readability and reusability for generating test data.
use App\Models\Post;

class PostFactory extends Factory {
    protected $model = Post::class;

    public function definition() {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
        ];
    }
}

// -------------------------------------------------------------
// 4) **Job Batching**
// Laravel 8.x introduced job batching, enabling developers to group multiple jobs together for batch processing.
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;

$batch = Bus::batch([
    new ProcessPodcast,
    new SendWelcomeEmail,
])->dispatch();

// -------------------------------------------------------------
// 5) **Rate Limiting Improvements**
// The new rate-limiting system allows for fine-grained control over API rate limits and custom logic.
use Illuminate\Cache\RateLimiter;

RateLimiter::for('api', function (RateLimiter $rateLimiter) {
    return $rateLimiter->by('user-api')->every(60)->max(100); // 100 requests per minute
});

// -------------------------------------------------------------
// 6) **Time Testing with Fake Time**
// A new time testing feature simplifies testing for time-sensitive code using Carbon's test utilities.
use Carbon\Carbon;

Carbon::setTestNow(Carbon::create(2020, 1, 1));
echo Carbon::now();  // Output: 2020-01-01 00:00:00

// -------------------------------------------------------------
// 7) **Tailwind CSS and Pagination**
// Built-in support for Tailwind CSS in pagination templates ensures seamless integration with modern UI frameworks.
$users = User::paginate(10);
// {{ $users->links() }}

// -------------------------------------------------------------
// 8) **Controller Route Binding**
// Simplified route bindings to controller methods, reducing boilerplate code in the routes file.
use App\Http\Controllers\UserController;

Route::get('/user/{user}', [UserController::class, 'show']);

// -------------------------------------------------------------
// 9) **Database Schema-First Migrations**
// Laravel 8.x introduced a new feature to generate migrations based on an existing database schema.
// Command:
// php artisan migrate:generate

// -------------------------------------------------------------
// 10) **Blade "foreach" Loop Enhancements**
// Blade's `@foreach` directive now provides direct access to the loop index and other metadata.
?>
@foreach($users as $user)
<p>{{ $loop->iteration }}: {{ $user->name }}</p>
@endforeach
<?php

// -------------------------------------------------------------
// Conclusion:
// Laravel 8.x focused on improving productivity, especially with new tools like Jetstream, job batching, and enhanced Blade templates.
// These features ensure a smooth and efficient development workflow.

?>
