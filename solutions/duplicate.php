<?php
/**
 * PHP class to check for duplicates in an array and count their occurrences.
 *
 * Author: Uthman Dev
 *
 * Description: This class allows you to find duplicates in an array, print their indices,
 * and count how many times each duplicate appears.
 */
class Duplicate
{
  private $array; // The input array
  private $seenNumber; // Array to track seen numbers
  private $occurrence; // Associative array to count occurrences

  // Constructor to initialize the input array
  public function __construct(array $array)
  {
    $this->array = $array;
    $this->seenNumber = [];
    $this->occurrence = [];
  }

  // Method to find duplicates and their occurrences
  public function isItDuplicate()
  {
    foreach ($this->array as $key => $value) {
      // Check if the value has already been seen
      if (in_array($value, $this->seenNumber)) {
        echo "Duplicate found at index $key with value $value\n";

        // Increment occurrence count for this value
        if (isset($this->occurrence[$value])) {
          $this->occurrence[$value]++;
        } else {
          $this->occurrence[$value] = 2; // Initially set to 2 since it's a duplicate
        }
      } else {
        // No duplicate found, add the value to the seen numbers array
        $this->seenNumber[] = $value;
        $this->occurrence[$value] = 1; // Track initial occurrence
      }
    }

    // Display the count of duplicates
    echo "\nOccurrence count for duplicates:\n";
    foreach ($this->occurrence as $num => $count) {
      if ($count > 1) {
        // Only display numbers that are duplicates
        echo "$num was duplicated $count times\n";
      }
    }
  }
}

// Example usage
$array = [1, 2, 3, 3, 7, 8, 5, 8, 7, 7, 5];
$duplicateChecker = new Duplicate($array);
$duplicateChecker->isItDuplicate();
?>
