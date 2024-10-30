def fibonacci(k):
    """
    Function to generate a Fibonacci sequence.
    
    This function generates a Fibonacci sequence up to a specified
    number of terms and returns it as a list.

    Parameters:
    k (int): The number of terms in the Fibonacci sequence to generate.

    Returns:
    list: A list containing the Fibonacci sequence up to the specified term count.
    """
    first_term = 0  # The first term of the Fibonacci sequence
    second_term = 1  # The second term of the Fibonacci sequence
    sequence = []  # List to store the Fibonacci sequence

    # Generate the Fibonacci sequence
    for n in range(k):
        sequence.append(first_term)  # Add the current first term to the sequence
        next_term = first_term + second_term  # Calculate the next term
        first_term = second_term  # Update the first term to the second term
        second_term = next_term  # Update the second term to the next term

    return sequence  # Return the generated Fibonacci sequence

# Example usage
print(fibonacci(5))  # Expected output: [0, 1, 1, 2, 3]
