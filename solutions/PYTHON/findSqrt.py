# Python function to calculate the integer square root of a non-negative number.
#
# Author: Uthman Dev
#
# Description: This function uses binary search to find the integer part of the square root
#              of a given number. If the number is a perfect square, it returns the exact root;
#              otherwise, it returns the closest integer less than or equal to the actual square root.
#
# Parameters:
# x (int): The non-negative integer to find the square root of.
#
# Returns:
# int: The integer part of the square root of x.

def integer_sqrt(x):
    # Special case for numbers less than 2
    if x < 2:
        return x

    left, right = 1, x // 2  # Define the search range

    # Perform binary search
    while left <= right:
        mid = (left + right) // 2  # Calculate the middle of the range
        square = mid * mid  # Compute the square of the middle value

        # Debugging output to verify pointer positions and current square
        print(f"Left: {left}, Right: {right}, Mid: {mid}, Square: {square}")

        # Check if the square of mid is equal to x
        if square == x:
            return mid  # Exact square root found

        # Adjust the search range based on the square of mid
        if square < x:
            left = mid + 1  # Move left pointer to the right to increase mid
        else:
            right = mid - 1  # Move right pointer to the left to decrease mid

    # At the end, right will be the integer part of the square root
    return right

# Example usage
x = 8  # The number to find the square root of
result = integer_sqrt(x)  # Call the function with the number

# Print the result
print("The integer square root is:", result)  # Expected output: 2