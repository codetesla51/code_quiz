def factorial(n):
    sequence = []  # Initialize an empty list to store the factorials
    for i in range(1, n + 1):  # Loop from 1 to n (inclusive)
        k = 1  # Initialize k to 1 for each i
        for j in range(1, i + 1):  # Loop from 1 to i (inclusive)
            k *= j
        sequence.append(k)  
    return sequence  

print(factorial(5))
