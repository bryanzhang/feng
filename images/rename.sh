#! /bin/bash

let line=1
find -name "*.jpg" | while read i
do
  mv $i ./renamed_$line.jpg
  let line=$line+1
  echo $line
done
