# Code Quiz
<p align="center">
  <img src="https://img.shields.io/github/license/codetesla51/code_quiz" alt="License">
  <img src="https://img.shields.io/github/v/tag/codetesla51/code_quiz?label=version" alt="Version">
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


## Contributing
Feel free to contribute by adding new questions and solutions in any programming language, including but not limited to JavaScript, Python, and C. Open issues for any suggestions or improvements!

## License
This repository is licensed under the MIT License.
