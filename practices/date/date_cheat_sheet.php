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

from w3schools
checkdate()	Validates a Gregorian date
date_add()	Adds days, months, years, hours, minutes, and seconds to a date
date_create_from_format()	Returns a new DateTime object formatted according to a specified format
date_create()	Returns a new DateTime object
date_date_set()	Sets a new date
date_default_timezone_get()	Returns the default timezone used by all date/time functions
date_default_timezone_set()	Sets the default timezone used by all date/time functions
date_diff()	Returns the difference between two dates
date_format()	Returns a date formatted according to a specified format
date_get_last_errors()	Returns the warnings/errors found in a date string
date_interval_create_from_date_string()	Sets up a DateInterval from the relative parts of the string
date_interval_format()	Formats the interval
date_isodate_set()	Sets the ISO date
date_modify()	Modifies the timestamp
date_offset_get()	Returns the timezone offset
date_parse_from_format()	Returns an associative array with detailed info about a specified date, according to a specified format
date_parse()	Returns an associative array with detailed info about a specified date
date_sub()	Subtracts days, months, years, hours, minutes, and seconds from a date
date_sun_info()	Returns an array containing info about sunset/sunrise and twilight begin/end, for a specified day and location
date_sunrise()	Returns the sunrise time for a specified day and location
date_sunset()	Returns the sunset time for a specified day and location
date_time_set()	Sets the time
date_timestamp_get()	Returns the Unix timestamp
date_timestamp_set()	Sets the date and time based on a Unix timestamp
date_timezone_get()	Returns the time zone of the given DateTime object
date_timezone_set()	Sets the time zone for the DateTime object
date()	Formats a local date and time
getdate()	Returns date/time information of a timestamp or the current local date/time
gettimeofday()	Returns the current time
gmdate()	Formats a GMT/UTC date and time
gmmktime()	Returns the Unix timestamp for a GMT date
gmstrftime()	Formats a GMT/UTC date and time according to locale settings
idate()	Formats a local time/date as integer
localtime()	Returns the local time
microtime()	Returns the current Unix timestamp with microseconds
mktime()	Returns the Unix timestamp for a date
strftime()	Formats a local time and/or date according to locale settings
strptime()	Parses a time/date generated with strftime()
strtotime()	Parses an English textual datetime into a Unix timestamp
time()	Returns the current time as a Unix timestamp
timezone_abbreviations_list()	Returns an associative array containing dst, offset, and the timezone name
timezone_identifiers_list()	Returns an indexed array with all timezone identifiers
timezone_location_get()	Returns location information for a specified timezone
timezone_name_from_ abbr()	Returns the timezone name from abbreviation
timezone_name_get()	Returns the name of the timezone
timezone_offset_get()	Returns the timezone offset from GMT
timezone_open()	Creates new DateTimeZone object
timezone_transitions_get()	Returns all transitions for the timezone
timezone_version_get()	Returns the version of the timezonedb
PHP Predefined Date/Time Constants
Constant	Description
DATE_ATOM	Atom (example: 2019-01-18T14:13:03+00:00)
DATE_COOKIE	HTTP Cookies (example: Fri, 18 Jan 2019 14:13:03 UTC)
DATE_ISO8601	ISO-8601 (example: 2019-01-18T14:13:03+0000)
DATE_RFC822	RFC 822 (example: Fri, 18 Jan 2019 14:13:03 +0000)
DATE_RFC850	RFC 850 (example: Friday, 18-Jan-19 14:13:03 UTC)
DATE_RFC1036	RFC 1036 (example: Friday, 18-Jan-19 14:13:03 +0000)
DATE_RFC1123	RFC 1123 (example: Fri, 18 Jan 2019 14:13:03 +0000)
DATE_RFC2822	RFC 2822 (example: Fri, 18 Jan 2019 14:13:03 +0000)
DATE_RFC3339	Same as DATE_ATOM (since PHP 5.1.3)
DATE_RFC3339_EXTENDED	RFC3339 Extended format (since PHP 7.0.0) (example: 2019-01-18T16:34:01.000+00:00)
DATE_RSS	RSS (Fri, 18 Jan 2019 14:13:03 +0000)
DATE_W3C	World Wide Web Consortium (example: 2019-01-18T14:13:03+00:00)
SUNFUNCS_RET_TIMESTAMP	Timestamp (since PHP 5.1.2)
SUNFUNCS_RET_STRING	Hours:minutes (example: 09:41) (since PHP 5.1.2)
SUNFUNCS_RET_DOUBLE	Hours as a floating point number (example: 9.75) (since PHP 5.1.2)

