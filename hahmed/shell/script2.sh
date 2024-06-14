echo "Enter your age"
read age
if [ $age -le 30 ]
then
 echo "You are young"
elif [ $age -le 60 ]
then
 echo "You are middle aged"
else
 echo "You are old"
fi

