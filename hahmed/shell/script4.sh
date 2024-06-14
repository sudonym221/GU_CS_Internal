i=1
while [ $i -le $1 ]
do
 echo -n -e "$i\t"
 i=`expr $i + 1`
done
