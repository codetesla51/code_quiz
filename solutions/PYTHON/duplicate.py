def find_duplicates(arr):
    left = 0
    right = 1
    dictionary = {}
    
    while right < len(arr):
        if arr[left] == arr[right]:  # Check if current pair is a duplicate
            if arr[left] in dictionary:
                dictionary[arr[left]] += 1  # Increment count if already in dictionary
            else:
                dictionary[arr[left]] = 2  # Initialize count as 2 (since it's found twice)
            right += 1  # Move the right pointer to find more duplicates
        else:
            left = right  # Move left to the position of right pointer
            right += 1  # Increment right pointer
    
    return dictionary

# Example usage
arr = [1, 2, 2, 3, 3, 3, 4, 5, 5, 5, 5]
print(find_duplicates(arr))  # Expected output: {2: 2, 3: 3, 5: 4}
