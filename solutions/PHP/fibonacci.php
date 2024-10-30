<?php
declare(strict_types=1);

/**
 * PHP class to generate a Fibonacci sequence.
 *
 * Author: Uthman Dev
 *
 * Description: This class generates a Fibonacci sequence up to a specified number
 * of terms and outputs it as a comma-separated string.
 */
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
