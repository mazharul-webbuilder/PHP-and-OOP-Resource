<?php

/**
 *PHP provides a comprehensive set of functions and superglobals for working with sessions.
 * Here are some of the most commonly used functions and superglobals for session management:
*/

/*-------------------------------------------------------------------------*/

session_start(); //Initiates or resumes a session.

/*-------------------------------------------------------------------------*/

session_id(); // Get or set the session ID.
$session_id = session_id();
echo "Session Id is " . $session_id . PHP_EOL; // Output: Session Id is jcpnn4fcjpaul8i88kchubfflj

/*-------------------------------------------------------------------------*/

$session_name = session_name();// Get or set the name of the current session.
echo "Session name is " . $session_name . PHP_EOL; // Output: Session name is PHPSESSID

/*-------------------------------------------------------------------------*/

$session_save_path = session_save_path(); //Get or set the save path for session files.
echo "Session save path is $session_save_path" . PHP_EOL; // OUTPUT: Session save path is C:\xampp\tmp

/*-------------------------------------------------------------------------*/

$session__current_status = session_status(); // Returns the current session status (e.g., PHP_SESSION_DISABLED, PHP_SESSION_NONE, PHP_SESSION_ACTIVE).
echo "Session current status: $session__current_status" . PHP_EOL; //Session current status: 2 Here: 0 mean disable, 1 mean None, 2 mean active

/*-------------------------------------------------------------------------*/
; // Regenerates the session ID to enhance security.
// session_regenerate_id();

/*-------------------------------------------------------------------------*/

session_destroy(); // Destroys the session and its data.

/*-------------------------------------------------------------------------*/

session_unset(); //Unsets a specific session variable.

/*-------------------------------------------------------------------------*/

print_r(session_get_cookie_params()); //Get the parameters for the session cookie.

//OUTPUT
//Array
//(
//    [lifetime] => 0
//    [path] => /
//    [domain] =>
//    [secure] =>
//    [httponly] =>
//    [samesite] =>
//)

/*-------------------------------------------------------------------------*/

//$lifetime = 600;
//session_set_cookie_params($lifetime); // Set the parameters for the session cookie.
//session_start();

/*-------------------------------------------------------------------------*/
