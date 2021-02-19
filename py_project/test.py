# def format_address(address_string):
#   # Declare variables
#   house_number = ""
#   # Separate the address string into parts
#   placeholder = address_string.split(' ')
#   house_number = placeholder[0]
#   # Traverse through the address parts
#   number_index = len(house_number)
#   house_number = address_string[:number_index]
#   address_part = address_string[number_index:] 
#   # for __:
#   #   # Determine if the address part is the
#   #   # house number or part of the street name

#   # # Does anything else need to be done 
#   # # before returning the result?
  
#   # Return the formatted string  
#   return "house number {} on street named{}".format(house_number, address_part)

# print(format_address("123 Main Street"))
# # Should print: "house number 123 on street named Main Street"

# print(format_address("1001 1st Ave"))
# # Should print: "house number 1001 on street named 1st Ave"

# print(format_address("55 North Center Drive"))
# # Should print "house number 55 on street named North Center Drive"


# house number 55 on street named North Center Drive


alist = [2,6,4,8,2,0]
print(sum(alist))
import wordcloud