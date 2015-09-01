#!/bin/sh

clear 
echo
echo '==> ZED assets'
echo 
gulp --gulpfile gulp/zed.js --cwd . assets
