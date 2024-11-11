# Python function to find the minimum element in a rotated sorted array.
#
# Author: Uthman Dev
#
# Description: This function takes a rotated sorted array and uses binary search to
#              find the minimum element in the array. If the array is not rotated, 
#              it returns the first element as the minimum.
#
# Parameters:
# arr (list): A rotated sorted list of integers.
#
# Returns:
# int: The minimum element in the array.

def find_minimum_in_rotated_array(arr):
    left = 0
    right = len(arr) - 1

    # Special case: If the array is not rotated
    if arr[left] < arr[right]:
        return arr[left]

    # Binary search to find the minimum element
    while left < right:
        mid = (left + right) // 2

        # Debugging output to verify pointer positions
        print(f"Left: {left}, Right: {right}, Mid: {mid}, Mid Element: {arr[mid]}")

        # If mid element is greater than the rightmost element, the minimum is in the right half
        if arr[mid] > arr[right]:
            left = mid + 1
        # Otherwise, the minimum is in the left half or at mid
        else:
            right = mid

    # At the end of the loop, left will be the index of the minimum element
    return arr[left]

# Example usage
arr = [4, 5, 6, 7, 0, 1, 2]  # Rotated sorted array
result = find_minimum_in_rotated_array(arr)  # Call the function with the array

# Print the result
print("The minimum value is:", result)  # Expected output: 0