weight = int(input("Weight: "))
unit = input("(k)g or (l)bs: ")

if unit.upper() == "k":
    converted = weight / 0.454
    print("Weight in kgs: " + str(converted))

else:
    converted = weight * 0.454
    print("Weight in lbs: " + str(converted))
