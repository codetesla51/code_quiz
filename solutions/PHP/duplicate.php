<?php
/**
 * Class DuplicateFinder
 *
 * This class provides functionality to identify and count duplicate elements
 * within a given array. It stores the duplicates along with their counts in
 * an associative array, allowing for easy access to the information.
 *
 * Author: Uthman Dev
 *
 * Example Usage:
 * $arr = [1, 2, 2, 3, 3, 3, 4, 5, 5, 5, 5];
 * $duplicateFinder = new DuplicateFinder($arr);
 * print_r($duplicateFinder->findDuplicates());
 * 
 * Output:
 * Array
 * (
 *     [2] => 2
 *     [3] => 3
 *     [5] => 4
 * )
 */
class DuplicateFinder
{
    private array $array; // The input array to search for duplicates
    private array $dictionary; // To store duplicates and their counts

    /**
     * Constructor to initialize the DuplicateFinder with an array.
     *
     * @param array $array - The input array to search for duplicates.
     */
    public function __construct(array $array)
    {
        $this->array = $array; // Assign the input array to the class property
        $this->dictionary = []; // Initialize the dictionary for duplicates
    }

    /**
     * Method to find duplicates in the initialized array.
     *
     * This method iterates through the array and compares each element
     * with the others to identify duplicates. It counts how many times
     * each duplicate appears and stores the result in the dictionary.
     *
     * @return array - An associative array with duplicate values and their counts.
     */
    public function findDuplicates(): array
    {
        $left = 0; // Pointer to the first element in the pair
        $right = 1; // Pointer to the second element in the pair

        // Loop through the array to find duplicates
        while ($right < count($this->array)) {
            // Check if the current element is equal to the left element
            if ($this->array[$right] === $this->array[$left]) {
                // If it is already in the dictionary, increment its count
                if (isset($this->dictionary[$this->array[$left]])) {
                    $this->dictionary[$this->array[$left]]++;
                } else {
                    // Initialize count to 2 since we found a duplicate
                    $this->dictionary[$this->array[$left]] = 2;
                }
            } else {
                // Move the left pointer to the current right element
                $left = $right;
            }
            // Move the right pointer to the next element
            $right++;
        }

        return $this->dictionary; // Return the dictionary with duplicates
    }
}

// Example usage
$arr = [1, 2, 2, 3, 3, 3, 4, 5, 5, 5, 5]; // Sample array
$duplicateFinder = new DuplicateFinder($arr); // Create an instance of DuplicateFinder
print_r($duplicateFinder->findDuplicates()); // Print duplicates and their counts
?>
