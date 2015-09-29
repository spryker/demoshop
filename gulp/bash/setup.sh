#!/bin/sh

clear
echo
echo '==> NPM setup'
echo 
npm install -d

# if no param or param = yves or param = all
if [ -z "$1" -o "$1" = "yves" -o "$1" = "all" ] 
	then
		echo
		echo '==> YVES'
		echo 
		gulp --gulpfile gulp/yves.js --cwd . dist
fi

# if no param or param = zed or param = all
if [ -z "$1" -o "$1" = "zed" -o "$1" = "all" ] 
	then
		echo
		echo '==> ZED'
		echo 
		gulp --gulpfile gulp/zed.js --cwd . dist
fi

