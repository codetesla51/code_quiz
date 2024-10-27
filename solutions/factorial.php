<?php
declare(strict_types=1);

/**
 * PHP class to calculate factorials of numbers in a sequence.
 *
 * Author: Uthman Dev
 *
 * Description: This class generates the factorial of each number from 1 to a given limit
 * and stores each result in an array.
 */
class FactorialCalculator
{
    private int $limit;           // The upper limit for factorial calculations
    private array $factorials;    // Array to store calculated factorials

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
?>
