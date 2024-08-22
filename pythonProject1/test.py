
name = input("Enter your name: ")
Adm_no = input("enter your admission number:")
math = int(input("Enter your math marks: "))
swahili = int(input("Enter your kiswahili marks: "))
english = int(input("Enter your english marks: "))
science = int(input("Enter your science marks: "))
ghc = int(input("Enter your GHC marks: "))

Total_mark = math + swahili + english + science + ghc
Average_mark = Total_mark / 5

print( name +" "+ str(Adm_no) + ":" + "Total mark is " + str(Total_mark) + " and average mark is " + str(Average_mark))