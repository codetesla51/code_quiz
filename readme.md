# Coding Questions Repository

## Overview
This repository contains a collection of coding questions along with their solutions. The questions focus on various programming concepts and algorithms, providing a resource for learners and developers to practice and improve their coding skills.

---

## Questions

### 1. Palindrome Checker
- **Description**: Given a string, determine if it is a palindrome. A string is considered a palindrome if it reads the same forward and backward, ignoring spaces, punctuation, and case sensitivity.

- **Solution**: 
  - Sanitize the input by removing non-alphanumeric characters and converting it to lowercase.
  - Reverse the sanitized string.
  - Compare the original sanitized string with its reversed version. If they are the same, the string is a palindrome.

- **Example**: 
  - For the input `"mom"`, the output is `true` because the string reads the same forwards and backwards.
  - For the input `"car"`, the output is `false` because the string does not read the same forwards and backwards.

---

### 2. Duplicate Number Finder
- **Description**: Given an array of numbers, determine which numbers are duplicates and count their occurrences.

- **Solution**: 
  - Use a hashmap (associative array) to track the occurrences of each number as you iterate through the array.
  - For each number, check if it has already been seen. If so, increment its count; if not, add it to the hashmap.
  - After processing the array, print the numbers that are duplicates along with their counts.

- **Example**: 
  - Given the array `[1, 2, 3, 3, 7, 8, 5, 8, 7, 7, 5]`, the output indicates that the number `3` appears `2` times, `7` appears `3` times, and `8` appears `2` times in the array.

---

## Contributing
Feel free to contribute by adding new questions and solutions. Open issues for any suggestions or improvements!

## License
This repository is licensed under the MIT License.
