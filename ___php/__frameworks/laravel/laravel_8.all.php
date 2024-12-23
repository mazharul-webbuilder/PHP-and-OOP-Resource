<?php

// 🚀 Laravel 8.x Series (Released: 2020)

// Key Features:

// 1) **Laravel Jetstream for Authentication and Scaffolding**
//    * Laravel 8.x introduced Jetstream for application scaffolding, offering built-in support for authentication, registration, two-factor authentication, session management, and API token management.
composer require laravel/jetstream
php artisan jetstream:install livewire  // or inertia

// 2) **Dynamic Blade Components**
//    * Laravel 8.x enhanced Blade components with the ability to pass dynamic attributes, making components more flexible.
?>
<x-alert :type="$type" :message="$message"/>

<?php

// 3) **Model Factory Improvements**
//    * Laravel 8.x updated model factories to use class-based factories by default for better organization and reusability.
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

// 4) **Job Batching**
//    * Laravel 8.x introduced job batching, allowing multiple jobs to be dispatched as a batch and handled together.
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;

$batch = Bus::batch([
    new ProcessPodcast,
    new SendWelcomeEmail,
])->dispatch();

// 5) **Rate Limiting Improvements**
//    * Laravel 8.x improved rate limiting, making it more flexible with the ability to define custom rate limiters.
use Illuminate\Cache\RateLimiter;

RateLimiter::for('api', function (RateLimiter $rateLimiter) {
    return $rateLimiter->by('user-api')->every(60)->max(100);
});

// 6) **Time Testing with Fake Time**
//    * Laravel 8.x introduced an improved method for faking time, making it easier to test time-dependent code.
use Carbon\Carbon;

Carbon::setTestNow(Carbon::create(2020, 1, 1));
echo Carbon::now();  // Output: 2020-01-01 00:00:00

// 7) **Tailwind CSS and Pagination**
//    * Laravel 8.x added built-in support for Tailwind CSS in pagination, making it easier to create beautiful paginated views.
{{ $users->links() }}

// 8) **Controller Route Binding**
//    * Laravel 8.x introduced controller route binding, simplifying route-to-controller method bindings.
Route::get('/user/{user}', [UserController::class, 'show']);

// 9) **Database Schema-First Migrations**
//    * Laravel 8.x added the ability to generate migrations based on existing database schemas using `migrate:generate`.
php artisan migrate:generate

// 10) **Blade "foreach" improvements**
//    * Laravel 8.x made Blade's `@foreach` directive more powerful by allowing direct access to the loop index.
@foreach($users as $user)
    <p>{{ $loop->iteration }}: {{ $user->name }}</p>
@endforeach

?>
