#!/bin/sh

clear
echo
echo '==> ZED'
echo 
gulp --gulpfile gulp/zed.js --cwd . $1 --target $2 --bundle $3
