<?php
/****
PHP class to check if a string is a palindrome.

Author: Uthman Dev

Description: This class contains a method to check if a given string is a palindrome
             by ignoring spaces and punctuation but keeping case sensitivity.
****/

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
    public function isPalindrome(): bool // Return type is boolean
    {
        // Convert the normalized string to lowercase for comparison
        $normalizedString = strtolower($this->string);

        // Reverse the normalized string
        $reversedString = strrev($normalizedString);

        // Debugging output to verify values
        echo "Normalized String: " . $normalizedString . PHP_EOL;  // Outputs the normalized string
        echo "Reversed String: " . $reversedString . PHP_EOL; // Outputs the reversed string

        // Return true if the original string equals the reversed string
        return $normalizedString === $reversedString;
    }
}

// Example usage:
$checker = new PalindromeChecker("A man, a plan, a canal: Panama");
echo $checker->isPalindrome() ? "true" : "false"; // Should output: true

?>
