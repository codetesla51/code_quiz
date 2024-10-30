def find_duplicates(arr):
    """
    Function to find and count duplicate elements in an array.
    
    This function takes an array as input and returns a dictionary
    with duplicate values as keys and their counts as values.
    
    Parameters:
    arr (list): The input array containing elements to check for duplicates.

    Returns:
    dict: A dictionary containing duplicates and their corresponding counts.
    """
    left = 0  # Pointer for the first element in the current pair
    right = 1  # Pointer for the second element in the current pair
    dictionary = {}  # Dictionary to store duplicates and their counts

    # Iterate through the array to find duplicates
    while right < len(arr):
        if arr[left] == arr[right]:  # Check if the current pair is a duplicate
            if arr[left] in dictionary:
                dictionary[arr[left]] += 1  # Increment count if already in dictionary
            else:
                dictionary[arr[left]] = 2  # Initialize count as 2 (found twice)
            right += 1  # Move the right pointer to find more duplicates
        else:
            left = right  # Move left to the position of the right pointer
            right += 1  # Increment right pointer to check the next element
    
    return dictionary  # Return the dictionary with duplicates

# Example usage
arr = [1, 2, 2, 3, 3, 3, 4, 5, 5, 5, 5]
print(find_duplicates(arr))  # Expected output: {2: 2, 3: 3, 5: 4}
