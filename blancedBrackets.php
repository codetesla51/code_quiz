<?php
declare(strict_types=1);

/**
 * PHP class to check if a sequence of brackets is balanced.
 *
 * Author: Uthman Dev
 *
 * Description: This class uses a stack-based approach with a hash map to check
 * if each bracket sequence has balanced opening and closing brackets.
 */
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
      "{" => "}"
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
?>
