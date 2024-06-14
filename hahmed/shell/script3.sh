echo "Enter a number"
read n
while [ $n -ge 0 ]
do
 echo "Hello"
 n=`expr $n - 1`
done
