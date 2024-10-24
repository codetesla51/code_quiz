<?php
/****
PHP class to check if a string is a palindrome.

Author: Uthman Dev

Description: This class contains a method to check if a given string is a palindrome
             by ignoring spaces and case sensitivity.
****/

class PalindromeChecker
{
  private $string;

  // Constructor to initialize the string
  public function __construct(string $string)
  {
    $this->string = strtolower(preg_replace("/[^a-z0-9]/", "", $string)); // Normalize the string
  }

  // Method to check if the string is a palindrome
  public function isPalindrome(): string
  {
    // Split the string into an array of characters
    $stringToArray = str_split($this->string);

    // Reverse the array of characters
    $reversedArray = array_reverse($stringToArray);

    // Convert the reversed array back to a string
    $reversedString = implode("", $reversedArray);

    // Return true if the original string equals the reversed string
    return $this->string === $reversedString;
  }
}

// Example usage:
$checker = new PalindromeChecker("A man, a plan, a canal: Panama");
echo $checker->isPalindrome() ? "true" : "false";

// Outputs: true

?>
