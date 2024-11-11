<?php

/****
PHP class to find the smallest element in a rotated sorted array.

Author: Uthman Dev

Description: This class uses binary search to find the minimum element in
             a rotated sorted array, where the array was originally sorted in
             ascending order and then rotated.
****/

class RotatedArrayMinFinder
{
    private array $arr;

    // Constructor to initialize the array
    public function __construct(array $arr)
    {
        $this->arr = $arr;
    }

    // Method to find the smallest element in the rotated sorted array
    public function findSmallest(): int
    {
        $left = 0;
        $right = count($this->arr) - 1;

        // If the array is not rotated, return the first element
        if ($this->arr[$left] < $this->arr[$right]) {
            return $this->arr[$left];
        }

        // Binary search to find the minimum element
        while ($left < $right) {
            $mid = floor(($left + $right) / 2);

            // If mid element is greater than the rightmost element,
            // the minimum is in the right half
            if ($this->arr[$mid] > $this->arr[$right]) {
                $left = $mid + 1;
            }
            // Otherwise, the minimum is in the left half (including mid)
            else {
                $right = $mid;
            }
        }

        // After the loop, left will point to the minimum element
        return $this->arr[$left];
    }
}

// Example usage:
$arr = [4, 5, 6, 7, 0, 1, 2];
$finder = new RotatedArrayMinFinder($arr);
echo "The minimum value is: " . $finder->findSmallest(); // Output: 0

?>