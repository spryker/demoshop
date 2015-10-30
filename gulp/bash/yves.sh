#!/bin/sh

clear
echo
echo '==> YVES'
echo
gulp --gulpfile gulp/yves.js --cwd . $1

echo
cd static/assets/Yves/styleguide
gulp --cwd . $1
cd -
