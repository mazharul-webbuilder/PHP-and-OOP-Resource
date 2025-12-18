<?php

declare(strict_types=1);

function add(int $a, int $b): int {
    return $a + $b;
}

echo add(100, 20);
echo add (100.25, 2); // Throw an error
