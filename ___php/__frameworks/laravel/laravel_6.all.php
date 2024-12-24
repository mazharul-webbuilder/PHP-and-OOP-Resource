<?php

// 🚀 Laravel 6.x Series (Released: 2019)
// -------------------------------------------------------------
// Laravel 6.x marked a significant milestone with the adoption of Semantic Versioning (SemVer) and was the first LTS release under this new system.
// Below is a summary of its key features:

// -------------------------------------------------------------
// 1) **Semantic Versioning (SemVer)**
// Laravel 6.x adopted semantic versioning, providing clarity in version updates and aligning with industry standards.
// It also introduced Long-Term Support (LTS), offering bug fixes for 2 years and security fixes for 3 years.
echo "Laravel 6.x is an LTS version with long-term support.";

// -------------------------------------------------------------
// 2) **Laravel UI Package**
// Frontend scaffolding (Bootstrap, Vue.js, React) was moved to the Laravel UI package, simplifying the core framework.
?>
// Installation example:
// composer require laravel/ui
// php artisan ui bootstrap --auth
<?php

// -------------------------------------------------------------
// 3) **Blade Component Tags**
// Laravel 6.x introduced enhanced Blade templating with component tags, making UI component management easier.
?>
<x-alert type="success" message="Data saved successfully!" />
<?php

// -------------------------------------------------------------
// 4) **Improved Job Middleware**
// Middleware for jobs was introduced, allowing pre-processing of jobs before execution. This helps in tasks like filtering or conditional handling.
class ProcessJobMiddleware {
    public function handle($job, $next): void
    {
        if (true) { // Replace with actual condition
            return;
        }
        $next($job);
    }
}

// -------------------------------------------------------------
// 5) **Lazy Collections**
// Lazy collections allow memory-efficient processing of large datasets by using generators.
use Illuminate\Support\LazyCollection;

LazyCollection::make(function () {
    foreach (range(1, 1000) as $number) {
        yield $number;
    }
})->each(function ($item) {
    echo $item; // Outputs numbers from 1 to 1000
});

// -------------------------------------------------------------
// 6) **Authorization Improvements**
// Resource policies were added, simplifying authorization logic for models.
class PostPolicy {
    public function update(User $user, Post $post) {
        return $user->id === $post->user_id; // Allow updates only if the user owns the post
    }
}

// -------------------------------------------------------------
// 7) **Carbon Date Handling Improvements**
// Integration with the Carbon date library was enhanced for easier and more powerful date manipulation.
use Carbon\Carbon;

$now = Carbon::now();       // Current date and time
$tomorrow = Carbon::tomorrow(); // Tomorrow's date

// -------------------------------------------------------------
// 8) **Custom Blade Directives**
// Custom Blade directives were introduced, enabling developers to define reusable Blade-specific logic.
use Illuminate\Support\Facades\Blade;

Blade::directive('datetime', function ($expression) {
    return "<?php echo (new Carbon($expression))->toDateString(); ?>";
});

// Usage in Blade template:
?>
@datetime('now') <!-- Outputs the current date -->
<?php

// -------------------------------------------------------------
// Conclusion:
// Laravel 6.x introduced foundational improvements with LTS support, lazy collections, job middleware, and better Blade templating.
// These updates made Laravel more scalable, developer-friendly, and efficient.

?>
