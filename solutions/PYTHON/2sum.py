# Python function to find two numbers in a sorted array that sum up to a target value.
#
# Author: Uthman Dev
#
# Description: This function takes a sorted array and a target sum as inputs,
#              and returns the 0-based indices of the two numbers that add up to
#              the target. If no such numbers exist, it returns None.
#
# Parameters:
# array (list): A sorted list of integers where we will search for two numbers.
# target (int): The target sum we want to find by adding two numbers from the array.
#
# Returns:
# tuple: A tuple containing the 0-based indices of the two numbers that add up to the target,
#         or None if no such numbers exist.

def two_sum(array, target):
    start = 0  # Initialize the start pointer at the beginning of the array
    end = len(array) - 1  # Initialize the end pointer at the end of the array

    # Loop until the two pointers meet
    while start < end:
        sum_value = array[start] + array[end]  # Calculate the current sum of the two pointed values

        # Debugging output to verify pointer positions and current sum
        print(f"Start Index: {start}, End Index: {end}")
        print(f"Values: {array[start]} + {array[end]} = {sum_value}")

        # Check if the current sum matches the target
        if sum_value == target:
            return start, end  # Return 0-based indices of the two numbers

        # Adjust pointers based on the current sum
        if sum_value < target:
            start += 1  # Move start pointer right to increase sum
        else:
            end -= 1  # Move end pointer left to decrease sum

    # Return None if no solution is found
    return None

# Example usage
array = [1, 2, 3, 4, 6, 7, 8]  # A sorted array of integers
target = 8  # The target sum we want to find
result = two_sum(array, target)  # Call the function with the array and target

# Print the result
print("Result:", result)  # Expected output: (3, 4) or similar pair
