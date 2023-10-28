PHP provides a wide range of string manipulation functions. Here's a list of some commonly used string manipulation functions in PHP:

strlen($string): Returns the length of a string.
str_replace($search, $replace, $string): Replaces all occurrences of a substring in a string.
substr($string, $start, $length): Returns a part of a string.
strpos($haystack, $needle): Finds the position of the first occurrence of a substring in a string.
stristr($haystack, $needle): Returns a part of the string from the first occurrence of a substring to the end, case-insensitive.
strstr($haystack, $needle): Returns a part of the string from the first occurrence of a substring to the end.
strtolower($string): Converts a string to lowercase.
strtoupper($string): Converts a string to uppercase.
ucfirst($string): Converts the first character of a string to uppercase.
ucwords($string): Converts the first character of each word in a string to uppercase.
trim($string): Removes whitespace or other characters from the beginning and end of a string.
ltrim($string): Removes whitespace or other characters from the beginning of a string.
rtrim($string): Removes whitespace or other characters from the end of a string.
strrev($string): Reverses a string.
str_pad($string, $length, $padding, $pad_type): Pads a string to a specified length with another string.
str_repeat($string, $multiplier): Repeats a string a specified number of times.
str_split($string, $length): Splits a string into an array of substrings.
strcasecmp($str1, $str2): Binary safe case-insensitive string comparison.
similar_text($str1, $str2, &$percent): Calculates the similarity between two strings.
str_word_count($string, $format, $charlist): Returns information about words used in a string.
str_shuffle($string): Randomly shuffles the characters in a string.
strcoll($str1, $str2): Locale based string comparison.
strcspn($str, $mask, $start, $length): Find length of initial segment not matching mask.
strtr($str, $from, $to): Translates certain characters in a string.
mb_strlen($string, $encoding): Returns the number of characters in a string, considering multibyte characters (requires the mbstring extension).
Remember to refer to the official PHP documentation for the most up-to-date and detailed information on these functions, as PHP continues to evolve, and new functions may be added over time. Additionally, some functions may require specific extensions, so make sure to check if they are available in your PHP environment.




User
all available date manipulation function in php
ChatGPT
PHP provides a variety of date and time manipulation functions to work with dates and times. Here's a list of some commonly used date and time manipulation functions in PHP:

date($format, $timestamp): Formats a timestamp into a human-readable date.
time(): Returns the current Unix timestamp.
strtotime($time, $now): Parses a date string into a Unix timestamp.
date_create($datetime, $timezone): Creates a new DateTime object.
date_format($object, $format): Formats a DateTime object as a string.
date_add($object, $interval): Adds an interval to a DateTime object.
date_sub($object, $interval): Subtracts an interval from a DateTime object.
date_diff($start, $end): Calculates the difference between two DateTime objects.
date_interval_create_from_date_string($interval): Creates a DateInterval object from a string.
date_default_timezone_set($timezone): Sets the default timezone for date and time functions.
date_timezone_set($object, $timezone): Sets the timezone of a DateTime object.
date_get_last_errors(): Returns the warnings and errors from the last date/time operation.
mktime($hour, $minute, $second, $month, $day, $year): Returns a Unix timestamp for a specific date and time.
strftime($format, $timestamp): Formats a timestamp according to the locale settings.
gmdate($format, $timestamp): Formats a timestamp in Greenwich Mean Time (GMT).
checkdate($month, $day, $year): Checks if a date is valid.
getdate($timestamp): Returns an array of date and time information.
date_parse($date): Returns an array of date components.
date_sunrise($timestamp, $format, $latitude, $longitude, $zenith, $gmt_offset): Calculates the time of sunrise for a given date and location.
date_sunset($timestamp, $format, $latitude, $longitude, $zenith, $gmt_offset): Calculates the time of sunset for a given date and location.
date_sun_info($timestamp, $latitude, $longitude): Returns an array of information about sunrise and sunset times.
timezone_identifiers_list(): Returns a list of supported timezones.
timezone_abbreviations_list(): Returns an associative array of timezone abbreviations.
date_default_timezone_get(): Gets the default timezone used by date and time functions.
These are just some of the key date and time manipulation functions in PHP. PHP's date and time handling capabilities are extensive, and you can perform a wide range of operations on dates and times using these functions. Always refer to the official PHP documentation for the most up-to-date and detailed information on these functions and any new ones that may have been added in the latest PHP versions.




User
I need all list, if not listed above give me full list
ChatGPT
Certainly, here's a more comprehensive list of date and time manipulation functions in PHP:

date($format, $timestamp): Formats a timestamp into a human-readable date.
idate($format, $timestamp): Formats a timestamp with integer-based output.
gmdate($format, $timestamp): Formats a timestamp in Greenwich Mean Time (GMT).
getdate($timestamp): Returns an associative array of date and time information.
localtime($timestamp, $is_associative = false): Returns the local time as an associative or indexed array.
checkdate($month, $day, $year): Checks if a date is valid.
strftime($format, $timestamp): Formats a timestamp according to the locale settings.
gmstrftime($format, $timestamp): Formats a timestamp in GMT according to the locale settings.
mktime($hour, $minute, $second, $month, $day, $year, $is_dst = -1): Returns a Unix timestamp for a specific date and time.
gmmktime($hour, $minute, $second, $month, $day, $year): Returns a Unix timestamp for a specific GMT date and time.
microtime($as_float = false): Returns the current Unix timestamp with microseconds.
strtotime($time, $now = time()): Parses a date string into a Unix timestamp.
gettimeofday($return_float = false): Returns the current time and date information.
date_create($datetime, $timezone = null): Creates a new DateTime object.
date_create_immutable($datetime, $timezone = null): Creates a new immutable DateTime object.
date_create_from_format($format, $datetime, $timezone = null): Returns a new DateTime object from a formatted date string.
date_create_immutable_from_format($format, $datetime, $timezone = null): Returns a new immutable DateTime object from a formatted date string.
date_format($object, $format): Formats a DateTime object as a string.
date_get_last_errors(): Returns the warnings and errors from the last date/time operation.
date_timestamp_get($object): Gets the Unix timestamp from a DateTime object.
date_timestamp_set($object, $timestamp): Sets the Unix timestamp of a DateTime object.
date_timezone_get($object): Gets the DateTimeZone object from a DateTime object.
date_timezone_set($object, $timezone): Sets the timezone of a DateTime object.
date_offset_get($object): Gets the timezone offset in seconds from UTC for a DateTime object.
date_diff($start, $end, $absolute = false): Calculates the difference between two DateTime objects.
date_add($object, $interval): Adds an interval to a DateTime object.
date_sub($object, $interval): Subtracts an interval from a DateTime object.
date_modify($object, $modify): Alters the timestamp of a DateTime object.
date_date_set($object, $year, $month, $day): Sets the date of a DateTime object.
date_time_set($object, $hour, $minute, $second, $microsecond = 0): Sets the time of a DateTime object.
date_create_from_timestamp($timestamp, $timezone = null): Creates a new DateTime object from a Unix timestamp.
date_create_immutable_from_timestamp($timestamp, $timezone = null): Creates a new immutable DateTime object from a Unix timestamp.
date_offset_set($object, $offset): Sets the timezone offset for a DateTime object.
date_isodate_set($object, $year, $week, $day): Sets the ISO date of a DateTime object.
date_timestamp($year, $month, $day, $hour = 0, $minute = 0, $second = 0): Returns a Unix timestamp for a specific date and time.
date($format, $timestamp): Formats a timestamp into a human-readable date.
strftime($format, $timestamp): Formats a timestamp according to the locale settings.
gmdate($format, $timestamp): Formats a timestamp in Greenwich Mean Time (GMT).
getdate($timestamp): Returns an associative array of date and time information.
gmstrftime($format, $timestamp): Formats a timestamp in GMT according to the locale settings.
mktime($hour, $minute, $second, $month, $day, $year, $is_dst = -1): Returns a Unix timestamp for a specific date and time.
gmmktime($hour, $minute, $second, $month, $day, $year): Returns a Unix timestamp for a specific GMT date and time.
microtime($as_float = false): Returns the current Unix timestamp with microseconds.
strtotime($time, $now = time()): Parses a date string into a Unix timestamp.
gettimeofday($return_float = false): Returns the current time and date information.
date_create($datetime, $timezone = null): Creates a new DateTime object.
date_create_immutable($datetime, $timezone = null): Creates a new immutable DateTime object.
date_create_from_format($format, $datetime, $timezone = null): Returns a new DateTime object from a formatted date string.
date_create_immutable_from_format($format, $datetime, $timezone = null): Returns a new immutable DateTime object from a formatted date string.
date_format($object, $format): Formats a DateTime object as a string.
date_get_last_errors(): Returns the warnings and errors from the last date/time operation.
date_timestamp_get($object): Gets the Unix timestamp from a DateTime object.
date_timestamp_set($object, $timestamp): Sets the Unix timestamp of a DateTime object.
date_timezone_get($object): Gets the DateTimeZone object from a DateTime object.
date_timezone_set($object, $timezone): Sets the timezone of a DateTime object.
date_offset_get($object): Gets the timezone offset in seconds from UTC for a DateTime object.
date_diff($start, $end, $absolute = false): Calculates the difference between two DateTime objects.
date_add($object, $interval): Adds an interval to a DateTime object.
date_sub($object, $interval): Subtracts an interval from a DateTime object.
date_modify($object, $modify): Alters the timestamp of a DateTime object.
date_date_set($object, $year, $month, $day): Sets the date of a DateTime object.
date_time_set($object, $hour, $minute, $second, $microsecond = 0): Sets the time of a DateTime object.
**date_create_from_timestamp($