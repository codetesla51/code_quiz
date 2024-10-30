# Python function to check if a string is a palindrome, ignoring non-alphanumeric characters and case.
#
# Author: Uthman Dev
#
# Description: This function takes a string as input, removes non-alphanumeric characters,
#              converts it to lowercase, and checks if it reads the same forwards and backwards.

import re

def is_palindrome(word):
    sanitized_string = re.sub(r"[^a-zA-Z0-9]", "", word)  # Remove non-alphanumeric characters
    normalized_string = sanitized_string.lower()  # Convert to lowercase
    reversed_string = normalized_string[::-1]  # Reverse the string

    return normalized_string == reversed_string  # Check if original matches reversed

# Example usage:
word = "A man, a plan, a canal, Panama"
print(is_palindrome(word))  # Expected output: True
