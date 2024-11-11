# Python function to perform binary search on a sorted array.
#
# Author: Uthman Dev
#
# Description: This function takes a sorted array and a target value, and performs a binary
#              search to find the index of the target. If the target is not found, it returns -1.
#
# Parameters:
# arr (list): A sorted list of integers.
# target (int): The integer value to search for.
#
# Returns:
# int: The index of the target in the array, or -1 if the target is not found.

def binary_search(arr, target):
    start = 0  # Initialize the start pointer at the beginning of the array
    end = len(arr) - 1  # Initialize the end pointer at the end of the array

    # Perform binary search
    while start <= end:
        mid = (start + end) // 2  # Calculate the middle of the range

        # Debugging output to verify pointer positions
        print(f"Start: {start}, End: {end}, Mid: {mid}, Mid Element: {arr[mid]}")

        # Check if the middle element is the target
        if arr[mid] == target:
            return mid  # Return the index if found

        # Adjust search range based on the middle element's value
        if arr[mid] < target:
            start = mid + 1  # Search the right half
        else:
            end = mid - 1  # Search the left half

    # Return -1 if the target is not found
    return -1

# Example usage
arr = list(range(1, 100001))  # A large sorted array
target = 7  # The target value to find
result = binary_search(arr, target)  # Call the function with the array and target

# Print the result
print("The target index is:", result)  # Expected output: 6 if target = 7