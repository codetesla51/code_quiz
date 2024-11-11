<?php

/****
PHP class to calculate the integer square root of a number.

Author: Uthman Dev

Description: This class calculates the integer square root of a non-negative integer
             using a binary search approach.
****/

class SquareRootCalculator
{
    private int $x; // The number to find the square root of

    // Constructor to initialize the number
    public function __construct(int $x)
    {
        $this->x = $x;
    }

    // Method to calculate the integer square root of the number
    public function calculate(): int // Return type is integer
    {
        // If the number is less than 2, its square root is the number itself
        if ($this->x < 2) {
            return $this->x;
        }

        $left = 1; // Left boundary for binary search
        $right = intdiv($this->x, 2); // Right boundary for binary search (x / 2)

        // Perform binary search
        while ($left <= $right) {
            $mid = intdiv($left + $right, 2); // Calculate the mid-point
            $square = $mid * $mid; // Calculate square of mid

            // If mid squared is exactly equal to x, return mid
            if ($square == $this->x) {
                return $mid;
            } 
            // If square is less than x, adjust left boundary to mid + 1
            elseif ($square < $this->x) {
                $left = $mid + 1;
            } 
            // If square is greater than x, adjust right boundary to mid - 1
            else {
                $right = $mid - 1;
            }
        }

        // Return the integer square root of x
        return $right;
    }
}

// Example usage:
$x = 8;
$squareRootCalculator = new SquareRootCalculator($x);
echo $squareRootCalculator->calculate(); // Should output: 2

?>