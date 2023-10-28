PHP has a variety of array functions for manipulating arrays. Below are some commonly used ones, and I'll try to include those available in the latest PHP version up to my last knowledge update in January 2028. Keep in mind that PHP might have introduced new functions or changes since then.

array(): Creates an array.

count(): Returns the number of elements in an array.

is_array(): Checks if a variable is an array.

empty(): Checks if an array is empty.

array_push(): Adds one or more elements to the end of an array.

array_pop(): Removes and returns the last element from an array.

array_shift(): Removes and returns the first element from an array.

array_unshift(): Adds one or more elements to the beginning of an array.

array_merge(): Merges one or more arrays into a new array.

array_combine(): Creates an array by using one array for keys and another for values.

array_key_exists(): Checks if the given key or index exists in the array.

array_keys(): Returns all the keys or a subset of keys from an array.

array_values(): Returns all the values from an array.

array_slice(): Returns a slice of an array based on offset and length.

array_splice(): Removes a portion of the array and replaces it with something else.

array_search(): Searches an array for a given value and returns the corresponding key if found.

in_array(): Checks if a value exists in an array.

array_reverse(): Reverses the order of elements in an array.

array_unique(): Removes duplicate values from an array.

array_diff(): Computes the difference between arrays.

array_intersect(): Computes the intersection of arrays.

array_map(): Applies a callback function to all elements of an array.

array_filter(): Filters elements of an array using a callback function.

array_reduce(): Reduces an array to a single value via a callback function.

array_walk(): Applies a user-defined function to each element of an array.

array_push(): Adds one or more elements to the end of an array.

array_pop(): Removes and returns the last element from an array.

array_product(): Calculates the product of values in an array.

array_sum(): Calculates the sum of values in an array.

array_fill(): Fills an array with values up to a specified length.

array_fill_keys(): Fills an array with values using keys from another array.

array_chunk(): Splits an array into chunks.

array_column(): Returns the values from a single column in a multi-dimensional array.

array_replace(): Replaces values in the first array with values from following arrays.

array_replace_recursive(): Recursively replaces elements in arrays.

array_flip(): Exchanges all keys with their associated values in an array.

array_rand(): Picks one or more random keys from an array.

range(): Creates an array containing a range of elements.

sort(): Sorts an array in ascending order.

rsort(): Sorts an array in descending order.

asort(): Sorts an array in ascending order, preserving keys.

arsort(): Sorts an array in descending order, preserving keys.

ksort(): Sorts an array by keys in ascending order.

krsort(): Sorts an array by keys in descending order.

natsort(): Sorts an array using a natural order algorithm.

usort(): Sorts an array using a user-defined comparison function.

uasort(): Sorts an array with a user-defined comparison function and maintains key association.

uksort(): Sorts an array by keys using a user-defined comparison function.

array_multisort(): Sorts multiple or multi-dimensional arrays.

array_fill(): Fills an array with values up to a specified length.

This list includes some of the most commonly used array functions in PHP, up to my last update in January 2022. Please refer to the latest PHP documentation for any new functions or changes introduced in versions beyond that date.




User
Is there any function for working with array that you not mentioned above?
ChatGPT
I mentioned many of the commonly used array functions in PHP, but PHP has a wide range of functions, and there are a few less commonly used or specialized array functions that I didn't mention in the previous list. Here are a few of them:

array_diff_assoc(): Computes the difference of arrays with additional index check.

array_diff_key(): Computes the difference of arrays using keys for comparison.

array_intersect_assoc(): Computes the intersection of arrays with additional index check.

array_intersect_key(): Computes the intersection of arrays using keys for comparison.

array_udiff(): Computes the difference of arrays by using a callback function for data comparison.

array_uintersect(): Computes the intersection of arrays by using a callback function for data comparison.

array_udiff_assoc(): Computes the difference of arrays with additional index check, using a callback function for data comparison.

array_uintersect_assoc(): Computes the intersection of arrays with additional index check, using a callback function for data comparison.

array_walk_recursive(): Applies a user-defined function recursively to each element in an array.

array_replace_callback(): Replaces values in an array by using a callback function.

array_replace_if_key_exists(): Replaces values in an array only if the specified key exists.

array_column(): Returns the values from a single column in a multi-dimensional array.

array_key_first(): Gets the first key of an array.

array_key_last(): Gets the last key of an array.

**array_push() and **array_pop() can also be used to manipulate elements in an array.

These functions are more specialized and may not be used as frequently as the core array functions. The choice of which function to use depends on the specific requirements of your PHP project and the data manipulation you need to perform. You can always refer to the official PHP documentation for the most up-to-date information on array functions and their usage.