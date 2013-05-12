#! /bin/bash

find -type d | sed 's@^\./@@g' |while read id
do
  if [[ $id != "." ]]; then
    cd $id
    image=`find -type f -name "*.*" | head -1 | sed 's@^\./@@g'`
    echo "update shop set image=\"$image\" where Id=$id;"
    cd ../
  fi
done
