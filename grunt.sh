#!/bin/bash
if [ "$1" == "--zed" ]; then
  if [ "$2" == "--watch" ]; then
    grunt dev --gruntfile config/Zed/Gruntfile.js
  else
    grunt devNoWatch --gruntfile config/Zed/Gruntfile.js
  fi
elif [ "$1" == "--yves" ]; then
  if [ "$2" == "--watch" ]; then
    grunt dev --gruntfile config/Yves/Gruntfile.js
  else
    grunt devNoWatch --gruntfile config/Yves/Gruntfile.js
  fi
else
  echo "Please use --zed or --yves to specify what grunt to run. ! you can add --watch as second parameter to activate the watch task at the end"
fi
