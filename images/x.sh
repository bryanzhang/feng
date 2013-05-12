for i in `ls .`
do
  if [ -f $i/1.jpg ]
  then
    echo "update shop set has_picture=1 where Id=$i;"
  fi
done

