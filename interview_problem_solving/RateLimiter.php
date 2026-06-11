<?php

class RateLimiter {
    public function __construct(
        public int $timeLengthInSecond, 
        public int $totalAllowed
    ) {}

    private array $requestStack = [];

    public function isAllowed($userId): bool {
        $now = time();

        // Initialize stack for this user if not exists
        if (!isset($this->requestStack[$userId])) {
            $this->requestStack[$userId] = [];
        }

        // Remove old requests outside the time window
        $this->requestStack[$userId] = array_filter(
            $this->requestStack[$userId],
            fn($timestamp) => ($now - $timestamp) < $this->timeLengthInSecond
        );

        // Check if user exceeded limit
        if (count($this->requestStack[$userId]) >= $this->totalAllowed) {
            return false; // Rate limit exceeded
        }

        // Record this request
        $this->requestStack[$userId][] = $now;
        return true; // Allowed
    }
}

// Example usage
$limiter = new RateLimiter(1, 5); // 5 requests per 1 second

for ($i = 1; $i <= 7; $i++) {
    echo $limiter->isAllowed(1) ? "Allowed\n" : "Rate limit exceeded\n";
    usleep(100000); // 0.1s delay between calls
    echo '<br>';

}
