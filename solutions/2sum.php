<?php
declare(strict_types=1);

/**
 * PHP class to find two numbers in a sorted array that sum up to a target value.
 *
 * Author: Uthman Dev
 *
 * Description: This class contains a method to find two indices in a sorted array where
 *              the numbers at those indices add up to a specified target value using
 *              the two-pointer technique. If found, it returns an array with the 1-based
 *              indices; otherwise, it returns an empty array.
 */
class TwoSumFinder
{
  private array $array;
  private int $target;

  /**
   * Constructor to initialize the array and target.
   *
   * @param array $array - Sorted array of integers.
   * @param int $target - Target sum for the two numbers.
   */
  public function __construct(array $array, int $target)
  {
    $this->array = $array;
    $this->target = $target;
  }

  /**
   * Method to find the two indices where the values sum up to the target.
   *
   * @return array - Returns an array with 1-based indices of the two numbers
   *                that add up to the target, or an empty array if no such
   *                numbers exist.
   */
  public function findTwoSum(): array
  {
    $start = 0;
    $end = count($this->array) - 1;

    while ($start < $end) {
      $sum = $this->array[$start] + $this->array[$end];

      // Debugging output to verify pointer positions and current sum
      echo "Start Index: " .
        ($start + 1) .
        ", End Index: " .
        ($end + 1) .
        PHP_EOL;
      echo "Values: " .
        $this->array[$start] .
        " + " .
        $this->array[$end] .
        " = $sum" .
        PHP_EOL;

      // Check if the current sum matches the target
      if ($sum === $this->target) {
        return [$start + 1, $end + 1]; // Return 1-based indices
      }

      // Adjust pointers based on the current sum
      if ($sum < $this->target) {
        $start++; // Move start pointer right to increase sum
      } else {
        $end--; // Move end pointer left to decrease sum
      }
    }

    // Return empty array if no solution is found
    return [];
  }
}

// Example usage:
$array = [1, 2, 3, 4, 6, 7, 8];
$target = 8;
$finder = new TwoSumFinder($array, $target);
$result = $finder->findTwoSum();

echo "Result: ";
print_r($result); // Expected output: Array with indices, e.g., [4, 5]
?>
