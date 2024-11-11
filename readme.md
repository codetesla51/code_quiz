<p align="center">
  <img src="https://img.shields.io/github/license/codetesla51/code_quiz" alt="License">
  <img src="https://img.shields.io/github/v/tag/codetesla51/code_quiz?label=version&cacheBust=1" alt="Version">
</p>

<h2 align="center">Code Quiz</h2>

![Local Image](ReadmeImg/file-cKTTEbkEr496F6N7SkfTHC2p.webp)

## Overview
This repository contains a collection of coding questions along with their solutions in PHP and Python. The questions focus on various programming concepts and algorithms, providing a valuable resource for learners and developers to practice and enhance their coding skills.

We use the most  **performant algorithms** to ensure that solutions are optimized for speed and efficiency.

#### Code Example Files
You can find the complete implementations of the questions and their solutions in the `solutions` folder of the repository. The folder contains separate directories for **PHP** and **Python**, each with fully documented code examples that follow best practices for clean, efficient coding.

## Table of Contents
- [Overview](#overview)
- [Questions](#questions)
  - [Palindrome Checker](#1-palindrome-checker)
  - [Duplicate Number Finder](#2-duplicate-number-finder)
  - [Missing Number Finder and Array Update](#3-missing-number-finder-and-array-update)
  - [Fibonacci Sequence](#4-fibonacci-sequence)
  - [Factorial](#5-factorial)
  - [Balanced Brackets](#6-balanced-brackets)
  - [Two Sum](#7-two-sum-finder)
  - [Find Target](#8-find-target)
  - [Find Smallest Number](#9-find-smallest-number)
  - [Find Integer Square Root](#10-find-integer-square-root)
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

**PHP code Solution**
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
**PYTHON code Solution**
```python
def is_palindrome(word):
    """
    Check if the input string is a palindrome.

    This function sanitizes the input string by removing non-alphanumeric characters
    and converting it to lowercase, then checks if the sanitized string is the same
    when read backwards.

    Parameters:
    word (str): The string to check for palindrome properties.

    Returns:
    bool: True if the string is a palindrome, False otherwise.
    """
    # Remove non-alphanumeric characters from the string
    sanitized_string = re.sub(r"[^a-zA-Z0-9]", "", word)
    
    # Convert the sanitized string to lowercase
    normalized_string = sanitized_string.lower()
    
    # Reverse the normalized string
    reversed_string = normalized_string[::-1]
    
    # Return True if the normalized string is equal to its reverse, else return False
    return normalized_string == reversed_string

# Example usage:
input_string = "A man, a plan, a canal, Panama"
print(is_palindrome(input_string))  # Expected output: True

```
---

### 2. Duplicate Number Finder

- **Description**: Given an array of numbers, determine which numbers are duplicates and count their occurrences.

- **Solution**: 
  - **Sort the Array**: First, sort the array to arrange duplicate numbers together.
  - **Two Pointers**: Use two pointers to traverse the sorted array. One pointer tracks the current unique number, while the other pointer checks for duplicates.
  - For each number, check if it has already been seen. If so, increment its count; if not, reset the count.
  - After processing the array, print the numbers that are duplicates along with their counts.

- **Example**: 
  - Given the array `[1, 2, 3, 3, 7, 8, 5, 8, 7, 7, 5]`, the output indicates that the number `3` appears `2` times, `7` appears `3` times, and `8` appears `2` times in the array.

**PHP code solution**
```php
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
```
**PYTHON code solution**
```Python
def find_duplicates(arr):
    """
    Function to find and count duplicate elements in an array.
    
    This function takes an array as input and returns a dictionary
    with duplicate values as keys and their counts as values.
    
    Parameters:
    arr (list): The input array containing elements to check for duplicates.

    Returns:
    dict: A dictionary containing duplicates and their corresponding counts.
    """
    left = 0  # Pointer for the first element in the current pair
    right = 1  # Pointer for the second element in the current pair
    dictionary = {}  # Dictionary to store duplicates and their counts

    # Iterate through the array to find duplicates
    while right < len(arr):
        if arr[left] == arr[right]:  # Check if the current pair is a duplicate
            if arr[left] in dictionary:
                dictionary[arr[left]] += 1  # Increment count if already in dictionary
            else:
                dictionary[arr[left]] = 2  # Initialize count as 2 (found twice)
            right += 1  # Move the right pointer to find more duplicates
        else:
            left = right  # Move left to the position of the right pointer
            right += 1  # Increment right pointer to check the next element
    
    return dictionary  # Return the dictionary with duplicates

# Example usage
arr = [1, 2, 2, 3, 3, 3, 4, 5, 5, 5, 5]
print(find_duplicates(arr))  # Expected output: {2: 2, 3: 3, 5: 4}

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
  
  **PHP code solution**
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
  
  **PYTHON code solution**
  ```python
  def missing_number(array):
    """
    Calculate the missing number in a sequence from 1 to n.

    This function assumes that the input array contains integers
    from 1 to n, with one number missing. It computes the expected
    sum of numbers in that range and compares it to the actual sum
    of the numbers present in the array.

    Parameters:
    array (list of int): A list of integers with one missing number.

    Returns:
    int: The missing number in the sequence.
    """
    n = len(array) + 1  # The total number of integers should be n (length of array + 1)
    expected_sum = n * (n + 1) // 2  # Calculate the expected sum of the sequence
    actual_sum = sum(array)  # Calculate the actual sum of the given array
    missing = expected_sum - actual_sum  # Determine the missing number
    return missing  # Return the missing number
```
</ul>

---
### 4. Fibonacci Sequence 
#### What is Fibonacci?
The **Fibonacci sequence** is a series of numbers in which each number is the sum of the two preceding ones, usually starting with 0 and 1. The sequence is defined by the following recurrence relation:
- **Description**: Generate the Fibonacci sequence up to a specified number of terms.

- **Solution**: 
  - Initialize two starting numbers, typically `0` and `1`.
  - Loop through the specified number of terms, each time adding the sum of the previous two numbers to the sequence.
  - Update the last two numbers at each step to continue generating the sequence.

- **Example**:
  - Given `n = 5`, the Fibonacci sequence generated is `[0, 1, 1, 2, 3]`.

**PHP code solution**

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
**PYTHON code solution**
```python
def fibonacci(k):
    """
    Function to generate a Fibonacci sequence.
    
    This function generates a Fibonacci sequence up to a specified
    number of terms and returns it as a list.

    Parameters:
    k (int): The number of terms in the Fibonacci sequence to generate.

    Returns:
    list: A list containing the Fibonacci sequence up to the specified term count.
    """
    first_term = 0  # The first term of the Fibonacci sequence
    second_term = 1  # The second term of the Fibonacci sequence
    sequence = []  # List to store the Fibonacci sequence

    # Generate the Fibonacci sequence
    for n in range(k):
        sequence.append(first_term)  # Add the current first term to the sequence
        next_term = first_term + second_term  # Calculate the next term
        first_term = second_term  # Update the first term to the second term
        second_term = next_term  # Update the second term to the next term

    return sequence  # Return the generated Fibonacci sequence

# Example usage
print(fibonacci(5))  # Expected output: [0, 1, 1, 2, 3]

```
---
<h3>5. Factorial</h3>
<h4>What is Factorial?</h4>
<p>
    The <strong>factorial</strong> of a non-negative integer <em>n</em> is the product of all positive integers less than or equal to <em>n</em>. 
    It is denoted by <em>n!</em>, and the factorial of 0 is defined as 1. Factorials are frequently used in combinatorics, probability, 
    and various mathematical computations.
</p>

<ul>
    <li><strong>Description</strong>: Calculate the factorial of a given number <em>n</em>.</li>
</ul>

<h4>Solution:</h4>
<ol>
    <li>Start with a result of 1.</li>
    <li>Multiply each integer from 1 up to <em>n</em> by the result to calculate the factorial.</li>
    <li>Alternatively, use recursion where <code>n! = n × (n-1)!</code>.</li>
</ol>

<h4>Example:</h4>
<p>Given <em>n = 5</em>, the factorial calculated is:</p>
<pre>
5! = 5 × 4 × 3 × 2 × 1 = 120
</pre>

**PHP code solution** 
```php
class FactorialCalculator
{
  private int $limit; // The upper limit for factorial calculations
  private array $factorials; // Array to store calculated factorials

  /**
   * Constructor to initialize the upper limit.
   *
   * @param int $limit - The highest number for which to calculate the factorial
   */
  public function __construct(int $limit)
  {
    $this->limit = $limit;
    $this->factorials = [];
  }

  /**
   * Method to calculate and store factorials in an array.
   *
   * @return void
   */
  public function calculateFactorials(): void
  {
    for ($i = 1; $i <= $this->limit; $i++) {
      $factorial = 1;
      for ($j = 1; $j <= $i; $j++) {
        $factorial *= $j;
      }
      $this->factorials[] = $factorial;
    }
  }

  /**
   * Method to display the calculated factorials.
   *
   * @return void
   */
  public function displayFactorials(): void
  {
    echo "Factorials up to {$this->limit}:\n";
    echo implode(", ", $this->factorials) . "\n";
  }
}

// Example usage
$calculator = new FactorialCalculator(5); // Set the limit to 5
$calculator->calculateFactorials();
$calculator->displayFactorials();
```
**PYTHON code solution**
```python
def factorial(n):
    """
    Calculate the factorials of numbers from 1 to n.

    This function computes the factorial for each integer from 1 to n
    and stores the results in a list. The factorial of a number is the
    product of all positive integers up to that number.

    Parameters:
    n (int): The upper limit for which to calculate factorials.

    Returns:
    list: A list containing the factorials of numbers from 1 to n.
    """
    sequence = []  # Initialize an empty list to store the factorials
    for i in range(1, n + 1):  # Loop from 1 to n (inclusive)
        k = 1  # Initialize k to 1 for each value of i
        for j in range(1, i + 1):  # Loop from 1 to i (inclusive)
            k *= j  # Multiply k by j to calculate the factorial
        sequence.append(k)  # Append the factorial of i to the sequence
    return sequence  # Return the list of factorials

# Example usage:
print(factorial(5))  # Expected output: [1, 2, 6, 24, 120]

```
<h3>6. Balanced Brackets</h3>
<h4>What is Balanced Brackets?</h4>
<p>
    A set of brackets (such as <code>()</code>, <code>[]</code>, <code>{}</code>) is considered <strong>balanced</strong> if each opening 
    bracket has a corresponding closing bracket, and they are correctly nested. This problem often appears in programming, especially 
    in syntax validation for expressions, HTML tags, and code blocks.
</p>

<ul>
    <li><strong>Description</strong>: Check if a given string containing brackets is balanced.</li>
</ul>

<h4>Solution:</h4>
<ol>
    <li>Initialize an empty stack to keep track of opening brackets.</li>
    <li>Loop through each character in the string:
        <ul>
            <li>If the character is an opening bracket (<code>(</code>, <code>[</code>, <code>{</code>), push it onto the stack.</li>
            <li>If it is a closing bracket (<code>)</code>, <code>]</code>, <code>}</code>), check if the top of the stack has the 
                corresponding opening bracket. If it does, pop the stack; if not, the brackets are unbalanced.</li>
        </ul>
    </li>
    <li>At the end of the loop, if the stack is empty, the brackets are balanced; otherwise, they are not.</li>
</ol>

<h4>Example:</h4>
<p>Given the string <code>"{[()]}"</code>, the brackets are balanced.</p>
<p>Given the string <code>"{[(])}"</code>, the brackets are <strong>not</strong> balanced.</p>

```php
class BracketBalancer
{
  private array $bracketsMap; // Associative array for matching brackets
  private array $bracketSequences; // Array of bracket sequences to check

  /**
   * Constructor to initialize the bracket map and bracket sequences
   *
   * @param array $bracketSequences - Array of bracket sequences
   */
  public function __construct(array $bracketSequences)
  {
    $this->bracketsMap = [
      "(" => ")",
      "[" => "]",
      "{" => "}",
    ];
    $this->bracketSequences = $bracketSequences;
  }

  /**
   * Method to check if each sequence of brackets is balanced
   *
   * @return void
   */
  public function checkBalancedBrackets(): void
  {
    foreach ($this->bracketSequences as $sequence) {
      $stack = []; // Stack to track opening brackets
      $isBalanced = true; // Flag to track if the sequence is balanced

      // Loop through each character in the bracket sequence
      foreach (str_split($sequence) as $char) {
        if (isset($this->bracketsMap[$char])) {
          // If the character is an opening bracket, push it onto the stack
          $stack[] = $char;
        } else {
          // If the character is a closing bracket, check for a match
          $lastOpeningBracket = array_pop($stack);

          // Check if the last opening bracket matches the current closing bracket
          if ($this->bracketsMap[$lastOpeningBracket] !== $char) {
            $isBalanced = false;
            break;
          }
        }
      }

      // If stack is not empty or isBalanced is false, the sequence is unbalanced
      if ($isBalanced && empty($stack)) {
        echo "The sequence \"$sequence\" is balanced.\n";
      } else {
        echo "The sequence \"$sequence\" is not balanced.\n";
      }
    }
  }
}

// Example usage
$bracketSequences = ["()", "[{}]", "(]", "{[()]}"];
$bracketBalancer = new BracketBalancer($bracketSequences);
$bracketBalancer->checkBalancedBrackets();
```
<div style="color:#008afa">Sorry Python Code Not Available Yet</div>

### 7. Two Sum Finder
- **Description**: Given a sorted array of numbers, determine two indices where the numbers at those indices add up to a specified target value.

- **Solution**:
  - Use the two-pointer technique to traverse the array.
  - Initialize one pointer at the start of the array and the other at the end.
  - Calculate the sum of the numbers at the two pointers.
  - If the sum matches the target, return the 1-based indices. If the sum is less than the target, move the start pointer to the right; if greater, move the end pointer to the left.
  - Continue until the two pointers meet.

- **Example**:
  - Given the sorted array `[1, 2, 3, 4, 6, 7, 8]` and a target of `8`, the output indicates that the numbers at indices `4` and `5` (which are `4` and `6`) add up to `8`.

  **PHP code solution** 
```php
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
print_r($result); // Expected output: Array with indices, e.g., [0, 5]

```
**PYTHON code solution**

```python
def two_sum(array, target):
    start = 0  # Initialize the start pointer at the beginning of the array
    end = len(array) - 1  # Initialize the end pointer at the end of the array

    # Loop until the two pointers meet
    while start < end:
        sum_value = array[start] + array[end]  # Calculate the current sum of the two pointed values

        # Debugging output to verify pointer positions and current sum
        print(f"Start Index: {start}, End Index: {end}")
        print(f"Values: {array[start]} + {array[end]} = {sum_value}")

        # Check if the current sum matches the target
        if sum_value == target:
            return start, end  # Return 0-based indices of the two numbers

        # Adjust pointers based on the current sum
        if sum_value < target:
            start += 1  # Move start pointer right to increase sum
        else:
            end -= 1  # Move end pointer left to decrease sum

    # Return None if no solution is found
    return None

# Example usage
array = [1, 2, 3, 4, 6, 7, 8]  # A sorted array of integers
target = 8  # The target sum we want to find
result = two_sum(array, target)  # Call the function with the array and target

# Print the result
print("Result:", result)  # Expected output: (3, 4) or similar pair

```
---
### 8. Find Target
- **Description**: Given a sorted array of numbers, find the index of a target value within the array using binary search. If the target is not found, return `-1`.

- **Solution**:
  - Initialize two pointers, one at the start of the array and the other at the end.
  - Calculate the middle index and compare the middle element with the target.
  - If the middle element matches the target, return the index.
  - If the middle element is less than the target, move the start pointer to the right; if greater, move the end pointer to the left.
  - Continue until the target is found or the pointers converge.

- **Example**:
  - Given the sorted array `[1, 2, 3, 4, 5, 6, 7, 8]` and a target of `6`, the output should be the index `5` (0-based) as `6` is found at that position.


**PHP Code Solution**

```php
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
  public function search(): int
  {
    // Return type is an integer (index or -1 if not found)
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

```
**PYTHON code solution**
```python
def binary_search(arr, target):
    start = 0  # Initialize the start pointer at the beginning of the array
    end = len(arr) - 1  # Initialize the end pointer at the end of the array

    # Perform binary search
    while start <= end:
        mid = (start + end) // 2  # Calculate the middle of the range

        # Debugging output to verify pointer positions
        print(f"Start: {start}, End: {end}, Mid: {mid}, Mid Element: {arr[mid]}")

        # Check if the middle element is the target
        if arr[mid] == target:
            return mid  # Return the index if found

        # Adjust search range based on the middle element's value
        if arr[mid] < target:
            start = mid + 1  # Search the right half
        else:
            end = mid - 1  # Search the left half

    # Return -1 if the target is not found
    return -1

# Example usage
arr = list(range(1, 100001))  # A large sorted array
target = 7  # The target value to find
result = binary_search(arr, target)  # Call the function with the array and target

# Print the result
print("The target index is:", result)  # Expected output: 6 if target = 7
```
---
### 9. Find Smallest Number
- **Description**: Given a rotated sorted array, find the smallest number in the array. A rotated sorted array is an array that was originally sorted in ascending order but then rotated (shifted) at some pivot.

- **Solution**:
  - The problem can be efficiently solved using binary search.
  - The idea is to compare the middle element with the rightmost element to determine which half of the array contains the smallest element.
  - If the middle element is greater than the rightmost element, the smallest element must lie in the right half of the array.
  - Otherwise, the smallest element must lie in the left half.
  - Repeat this process until the left pointer converges to the smallest element.

- **Example**:
  - Given the array `[5, 3, 8, 1, 6]`, the smallest number is `1`.


**PHP Code Solution**

```php
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

```
**PYTHON code solution**
```python
def find_minimum_in_rotated_array(arr):
    left = 0
    right = len(arr) - 1

    # Special case: If the array is not rotated
    if arr[left] < arr[right]:
        return arr[left]

    # Binary search to find the minimum element
    while left < right:
        mid = (left + right) // 2

        # Debugging output to verify pointer positions
        print(f"Left: {left}, Right: {right}, Mid: {mid}, Mid Element: {arr[mid]}")

        # If mid element is greater than the rightmost element, the minimum is in the right half
        if arr[mid] > arr[right]:
            left = mid + 1
        # Otherwise, the minimum is in the left half or at mid
        else:
            right = mid

    # At the end of the loop, left will be the index of the minimum element
    return arr[left]

# Example usage
arr = [4, 5, 6, 7, 0, 1, 2]  # Rotated sorted array
result = find_minimum_in_rotated_array(arr)  # Call the function with the array

# Print the result
print("The minimum value is:", result)  # Expected output: 0
```
---
### 10. Find Integer Square Root
- **Description**: Given a non-negative integer, find the integer part of its square root.

- **Solution**:
  - Use a binary search approach to find the integer part of the square root.
  - If the number is less than 2, the square root is the number itself.
  - Otherwise, perform binary search to find the integer square root.

- **Example**:
  - Given the number `8`, the integer square root is `2`.

 **PHP Code Solution**
 ```php
 class SquareRootCalculator
{
  private int $x; // The number to find the square root of

  // Constructor to initialize the number
  public function __construct(int $x)
  {
    $this->x = $x;
  }

  // Method to calculate the integer square root of the number
  public function calculate(): int
  {
    // Return type is integer
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

 ```
**PYTHON code solution**
```python
def integer_sqrt(x):
    # Special case for numbers less than 2
    if x < 2:
        return x

    left, right = 1, x // 2  # Define the search range

    # Perform binary search
    while left <= right:
        mid = (left + right) // 2  # Calculate the middle of the range
        square = mid * mid  # Compute the square of the middle value

        # Debugging output to verify pointer positions and current square
        print(f"Left: {left}, Right: {right}, Mid: {mid}, Square: {square}")

        # Check if the square of mid is equal to x
        if square == x:
            return mid  # Exact square root found

        # Adjust the search range based on the square of mid
        if square < x:
            left = mid + 1  # Move left pointer to the right to increase mid
        else:
            right = mid - 1  # Move right pointer to the left to decrease mid

    # At the end, right will be the integer part of the square root
    return right

# Example usage
x = 8  # The number to find the square root of
result = integer_sqrt(x)  # Call the function with the number

# Print the result
print("The integer square root is:", result)  # Expected output: 2
```
## Contributing
Feel free to contribute by adding new questions and solutions in any programming language, including but not limited to JavaScript, Python, and C. Open issues for any suggestions or improvements!

## License
This repository is licensed under the MIT License.
