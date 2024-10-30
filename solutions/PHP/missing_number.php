<?php
declare(strict_types=1);
/**
 * PHP class to find the missing number in a sequence.
 *
 * Author: Uthman Dev
 *
 * Description: This class calculates the missing number in a sequence of integers
 * where only one number is missing. It uses the sum formula for a range to find
 * the missing value and then adds it back to the array.
 */
class MissingNumberFinder
{
  private $numbers; // The input array of numbers

  /**
   * Constructor to initialize the input array
   *
   * @param array $numbers - The array of numbers in the sequence
   */
  public function __construct(array $numbers)
  {
    $this->numbers = $numbers;
  }

  /**
   * Method to calculate, add, and display the missing number in the sequence
   *
   * @return void
   */
  public function findAndAddMissingNumber(): void
  {
    // Calculate the sum of numbers in the array
    $actualSum = array_sum($this->numbers);

    // Find the maximum expected number in the sequence
    $maxNumber = max($this->numbers);

    // Calculate the expected sum for a full sequence from 1 to maxNumber
    $expectedSum = ($maxNumber * ($maxNumber + 1)) / 2;

    // Calculate the missing number as the difference between expected and actual sums
    $missingNumber = $expectedSum - $actualSum;

    // Add the missing number to the array
    $this->numbers[] = $missingNumber;

    // Sort the array to keep the sequence in order
    sort($this->numbers);

    // Output the result
    echo "The missing number is: $missingNumber\n";
    echo "Updated array with the missing number added: " . implode(", ", $this->numbers) . "\n";
  }
}

// Example usage
$numbers = [1, 2, 4, 5]; // Sequence with missing number 3
$missingFinder = new MissingNumberFinder($numbers);
$missingFinder->findAndAddMissingNumber();
?>
