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
    n = len(array) + 1
    expected_sum = n * (n + 1) // 2
    actual_sum = sum(array)
    missing = expected_sum - actual_sum
    return missing

# Example usage
array = [1, 2, 3, 4, 6]
missing = missing_number(array)
print("Missing number:", missing)  # Expected output: Missing number, e.g., 5
