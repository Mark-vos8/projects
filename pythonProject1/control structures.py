temp = int(input("Enter the temperatute value:  ") )

if temp >= 30:
    print("it's a hot day")

elif temp >= 20 and temp < 30:
    print("it's a bit hot today")
elif temp >= 10 and temp < 20:
    print("It's a bit cold")
else:
    print("it's cold today")