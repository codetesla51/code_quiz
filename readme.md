<h1 align="center">Code Quiz</h1>

<p align="center">
  <img src="https://img.shields.io/github/license/codetesla51/code_quiz" alt="License">
  <img src="https://img.shields.io/github/v/tag/codetesla51/code_quiz?label=version&cacheBust=1" alt="Version">
</p>


---


## Overview
This repository contains a collection of coding questions along with their
solutions In PHP. The questions focus on various programming concepts and algorithms,
providing a resource for learners and developers to practice and improve their
coding skills.

#### Code example files can be found in the solutions folder of the repository.Please check there for full implementations.
---

## Table of Contents
- [Overview](#overview)
- [Questions](#questions)
  - [Palindrome Checker](#1-palindrome-checker)
  - [Duplicate Number Finder](#2-duplicate-number-finder)
  - [Missing Number Finder and Array
  Update](#3-missing-number-finder-and-array-update)
- [Contributing](#contributing)
- [License](#license)

---
## Questions

### 1. Palindrome Checker
- **Description**: Given a string, determine if it is a palindrome. A string is considered a palindrome if it reads the same forward and backward, ignoring spaces, punctuation, and case sensitivity.

- **Solution**: 
  - Sanitize the input by removing non-alphanumeric characters and converting it to lowercase.
  - Reverse the sanitized string.
  - Compare the original sanitized string with its reversed version. If they are the same, the string is a palindrome.

- **Example**: 
  - For the input `"A man, a plan, a canal: Panama"`, the output is `true` because the string reads the same forwards and backwards.
  - For the input `"race a car"`, the output is `false` because the string does not read the same forwards and backwards.

**code Solution**
```php
class PalindromeChecker
{
  private $string;

  // Constructor to initialize the string
  public function __construct(string $string)
  {
    // Normalize the string: remove non-alphanumeric characters
    $this->string = preg_replace("/[^a-zA-Z0-9]/", "", $string);
  }

  // Method to check if the string is a palindrome
  public function isPalindrome(): bool
  {
    // Return type is boolean
    // Convert the normalized string to lowercase for comparison
    $normalizedString = strtolower($this->string);

    // Reverse the normalized string
    $reversedString = strrev($normalizedString);

    // Debugging output to verify values
    echo "Normalized String: " . $normalizedString . PHP_EOL; // Outputs the normalized string
    echo "Reversed String: " . $reversedString . PHP_EOL; // Outputs the reversed string

    // Return true if the original string equals the reversed string
    return $normalizedString === $reversedString;
  }
}
// check resluts
$checker = new PalindromeChecker("A man, a plan, a canal: Panama");
echo $checker->isPalindrome() ? "true" : "false"; // Should output: true

```

---

### 2. Duplicate Number Finder
- **Description**: Given an array of numbers, determine which numbers are duplicates and count their occurrences.

- **Solution**: 
  - Use a hashmap (associative array) to track the occurrences of each number as you iterate through the array.
  - For each number, check if it has already been seen. If so, increment its count; if not, add it to the hashmap.
  - After processing the array, print the numbers that are duplicates along with their counts.

- **Example**: 
  - Given the array `[1, 2, 3, 3, 7, 8, 5, 8, 7, 7, 5]`, the output indicates that the number `3` appears `2` times, `7` appears `3` times, and `8` appears `2` times in the array.

**code solution**
```php
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
```
---
### 3. Missing Number Finder and Array Update

<ul>
  <li><strong>Description</strong>: Given an array containing a sequence of unique numbers starting from <code>1</code> but with one number missing, determine the missing number, add it back into the array, and print the updated array.</li>
  
  <li><strong>Solution</strong>:
    <ul>
      <li>Calculate the sum of numbers in the array.</li>
      <li>Use the formula for the sum of the first <code>n</code> natural numbers, where <code>n</code> is the largest number in the array:  
        <div>
          <code>expected sum = (n * (n + 1)) / 2</code>
        </div>
      </li>
      <li>Subtract the actual sum of the numbers in the array from the expected sum to find the missing number.</li>
      <li>Append the missing number to the array and print the updated array.</li>
    </ul>
  </li>

  <li><strong>Example</strong>:
    <ul>
      <li>Given the array <code>[1, 2, 4, 5]</code>, the output should indicate that the missing number is <code>3</code>, and the updated array is <code>[1, 2, 3, 4, 5]</code>.</li>
    </ul>
  </li>
  
  **code solution**
  ```php
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
    echo "Updated array with the missing number added: " .
      implode(", ", $this->numbers) .
      "\n";
  }
}

// Example usage
$numbers = [1, 2, 4, 5]; // Sequence with missing number 3
$missingFinder = new MissingNumberFinder($numbers);
$missingFinder->findAndAddMissingNumber();
  ```
</ul>

---
### 4. Fibonacci Sequence Generator
#### What is Fibonacci?
The **Fibonacci sequence** is a series of numbers in which each number is the sum of the two preceding ones, usually starting with 0 and 1. The sequence is defined by the following recurrence relation:
- **Description**: Generate the Fibonacci sequence up to a specified number of terms.

- **Solution**: 
  - Initialize two starting numbers, typically `0` and `1`.
  - Loop through the specified number of terms, each time adding the sum of the previous two numbers to the sequence.
  - Update the last two numbers at each step to continue generating the sequence.

- **Example**:
  - Given `n = 5`, the Fibonacci sequence generated is `[0, 1, 1, 2, 3]`.

**code solution**

```php
class FibonacciGenerator
{
  private int|float $termCount;
  private int|float $firstTerm;
  private int|float $secondTerm;
  private array $sequence;

  /**
   * Constructor to initialize the Fibonacci sequence parameters.
   *
   * @param int,float $termCount - Number of Fibonacci terms to generate.
   */
  public function __construct(int|float $termCount)
  {
    $this->termCount = $termCount;
    $this->firstTerm = 0;
    $this->secondTerm = 1;
    $this->sequence = [];
  }

  /**
   * Method to generate and output the Fibonacci sequence as a comma-separated string.
   *
   * @return void
   */
  public function generateFibonacci(): void
  {
    for ($i = 0; $i < $this->termCount; $i++) {
      $this->sequence[] = $this->firstTerm;
      $nextValue = $this->firstTerm + $this->secondTerm;
      $this->firstTerm = $this->secondTerm;
      $this->secondTerm = $nextValue;
    }

    echo implode(", ", $this->sequence) . "\n";
  }
}

// Example usage
$fibonacciGenerator = new FibonacciGenerator(5);
$fibonacciGenerator->generateFibonacci();

```
## Contributing
Feel free to contribute by adding new questions and solutions in any programming language, including but not limited to JavaScript, Python, and C. Open issues for any suggestions or improvements!

## License
This repository is licensed under the MIT License.
