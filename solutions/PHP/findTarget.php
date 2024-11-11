<?php

/****
PHP class to perform binary search on an array.

Author: Uthman Dev

Description: This class contains a method to perform binary search on a sorted array.
             It returns the index of the target if found, or -1 if not found.
****/

class BinarySearch
{
    private array $arr; // Array in which to search
    private int $target; // Target value to search for

    // Constructor to initialize the array and target
    public function __construct(array $arr, int $target)
    {
        $this->arr = $arr;
        $this->target = $target;
    }

    // Method to perform binary search
    public function search(): int // Return type is an integer (index or -1 if not found)
    {
        $start = 0; // Starting index of the search range
        $end = count($this->arr) - 1; // Ending index of the search range

        // Loop to continue the search as long as start index is less than or equal to end index
        while ($start <= $end) {
            $mid = intdiv($start + $end, 2); // Calculate the middle index (floor division)

            // Check if the middle element is less than the target
            if ($this->arr[$mid] < $this->target) {
                $start = $mid + 1; // Move the start index right if the target is larger
            } 
            // Check if the middle element is greater than the target
            elseif ($this->arr[$mid] > $this->target) {
                $end = $mid - 1; // Move the end index left if the target is smaller
            } 
            // If the middle element equals the target, return the index
            else {
                return $mid;
            }
        }
        
        // Return -1 if target is not found in the array
        return -1;
    }
}

// Example usage:
$target = 7;
$n = 100000;
$arr = range(1, $n); // Generate an array of numbers from 1 to 100000
$binarySearch = new BinarySearch($arr, $target);
print_r($binarySearch->search()); // Output: 6

?>