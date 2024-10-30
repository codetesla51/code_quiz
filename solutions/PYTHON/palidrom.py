import re

# Function to check if a string is a palindrome
#
# Author: Uthman Dev
#
# Description: This function takes a string as input, removes non-alphanumeric characters,
#              converts it to lowercase, and checks if it reads the same forwards and backwards.
#
# Parameters:
# word (str): The input string to check for palindrome properties.
#
# Returns:
# bool: True if the string is a palindrome, False otherwise.
def is_palindrome(word):
    """
    Check if the input string is a palindrome.

    This function sanitizes the input string by removing non-alphanumeric characters
    and converting it to lowercase, then checks if the sanitized string is the same
    when read backwards.

    Parameters:
    word (str): The string to check for palindrome properties.

    Returns:
    bool: True if the string is a palindrome, False otherwise.
    """
    # Remove non-alphanumeric characters from the string
    sanitized_string = re.sub(r"[^a-zA-Z0-9]", "", word)
    
    # Convert the sanitized string to lowercase
    normalized_string = sanitized_string.lower()
    
    # Reverse the normalized string
    reversed_string = normalized_string[::-1]
    
    # Return True if the normalized string is equal to its reverse, else return False
    return normalized_string == reversed_string

# Example usage:
input_string = "A man, a plan, a canal, Panama"
print(is_palindrome(input_string))  # Expected output: True
