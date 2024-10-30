# Function to calculate the factorial of numbers up to n
#
# Author: Uthman Dev
#
# Description: This function computes the factorial for each number from 1 to n (inclusive)
#              and returns a list of these factorials.
#
# Parameters:
# n (int): The upper limit for which to calculate factorials (inclusive).
#
# Returns:
# list: A list containing the factorials of numbers from 1 to n.

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
