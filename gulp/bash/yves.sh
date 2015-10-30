#!/bin/sh

clear
echo
echo '==> YVES'
echo 
gulp --gulpfile gulp/yves.js --cwd . $1
# gulp --gulpfile static/assets/Yves/styleguide/gulpfile.js
