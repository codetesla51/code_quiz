# 
# Python function to find the missing number in a sequence of integers.
# 
# Author: Uthman Dev
# 
# Description: This function calculates the expected sum of a sequence of
#              consecutive integers from 1 up to the length of the array plus one.
#              By subtracting the actual sum of the given array from the expected sum,
#              it determines the missing number in the sequence.
#

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

# Example usage
array = [1, 2, 3, 4, 6]  # Input array with a missing number (5)
missing = missing_number(array)  # Call the function to find the missing number
print("Missing number:", missing)  # Expected output: Missing number: 5
