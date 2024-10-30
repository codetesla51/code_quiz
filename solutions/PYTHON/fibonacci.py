def fibonacci(k):
   first_term =0
   second_term = 1
   sequcence = []
   for n in range(k):
     sequcence.append(first_term)
     next_term = first_term + second_term
     first_term = second_term
     second_term = next_term
   return sequcence
   
print(fibonacci(5))
