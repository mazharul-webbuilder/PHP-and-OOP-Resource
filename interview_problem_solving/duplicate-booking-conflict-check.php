<?php
/**
 * PRACTICE PROBLEM: Seat Booking Conflict Checker
 * ------------------------------------------------
 * (Loosely inspired by the kind of seat-locking problem you'd hit
 * in a bus/transport booking system — good warm-up, not too heavy.)
 *
 * You are given a list of existing seat bookings for a single bus trip,
 * and a new booking request. Each booking has a seat number and a
 * time range (start and end, as integers representing minutes from
 * trip start — this models a multi-stop route where a seat can be
 * booked for only part of the journey).
 *
 * Write a function `hasConflict()` that returns true if the new
 * booking overlaps with any existing booking on the SAME seat.
 *
 * Two time ranges [startA, endA] and [startB, endB] overlap if:
 *   startA < endB AND startB < endA
 *
 * ----------------------------------------------------------------
 * INPUT FORMAT
 *
 * $existingBookings = [
 *     ['seat' => 12, 'start' => 0,  'end' => 100],
 *     ['seat' => 12, 'start' => 150, 'end' => 300],
 *     ['seat' => 5,  'start' => 0,  'end' => 300],
 * ];
 *
 * $newBooking = ['seat' => 12, 'start' => 90, 'end' => 160];
 *
 * ----------------------------------------------------------------
 * TASK
 *
 * 1. Implement hasConflict() below.
 * 2. Bonus (optional): implement findAvailableSeats() that, given a
 *    list of all seats (e.g. 1 to 40) and existing bookings, returns
 *    which seats are fully free for a given [start, end] range.
 *
 * Run this file with: php php_practice_problem.php
 */

function hasConflict(array $existingBookings, array $newBooking): bool
{
    $filteredArray = array_filter($existingBookings, function($item)use($newBooking){
        return $item['seat'] === $newBooking['seat'];
    
    });
    if(!count($filteredArray)){
        return false;
    }

    foreach($filteredArray as $booking){
        if($newBooking['start'] > $booking['start'] && $newBooking['end'] < $booking['end']){
            return true;
        }
    }
    return false;

}

// ---------- BONUS (optional) ----------
function findAvailableSeats(array $allSeats, array $existingBookings, int $start, int $end): array
{
    // TODO: implement this
    // Return the subset of $allSeats that have NO conflicting booking
    // for the [start, end] range.

    return [];
}

// ---------------------------------------------------------------
// TEST CASES — uncomment and run once you've implemented the function
// ---------------------------------------------------------------

$existingBookings = [
    ['seat' => 12, 'start' => 0,   'end' => 100],
    ['seat' => 12, 'start' => 150, 'end' => 300],
    ['seat' => 5,  'start' => 0,   'end' => 300],
];

$tests = [
    // [newBooking, expectedResult]
    [['seat' => 12, 'start' => 90,  'end' => 160], true],   // overlaps first booking (90-100 range)
    [['seat' => 12, 'start' => 100, 'end' => 150], false],  // touches but doesn't overlap (adjacent)
    [['seat' => 12, 'start' => 200, 'end' => 250], true],   // overlaps second booking
    [['seat' => 7,  'start' => 0,   'end' => 300], false],  // seat 7 has no existing bookings
    [['seat' => 5,  'start' => 10,  'end' => 20],  true],   // fully inside existing booking
];

echo "=== hasConflict() tests ===" . "<br>";
foreach ($tests as $i => [$newBooking, $expected]) {
    $result = hasConflict($existingBookings, $newBooking);
    $status = ($result === $expected) ? 'PASS' : 'FAIL';
    echo "Test " . ($i + 1) . ": {$status} (expected: " . var_export($expected, true) . ", got: " . var_export($result, true) . ")\n";
    echo "<br>";
}

// Bonus test (uncomment once implemented)
// $allSeats = range(1, 15);
// $available = findAvailableSeats($allSeats, $existingBookings, 50, 120);
// echo "\nAvailable seats for [50,120]: " . implode(', ', $available) . "\n";