#!/bin/bash

#######################################################################################
# http://phantomjs.org/build.html
#
# Warning: Compiling PhantomJS from source takes a long time, mainly due to thousands
# of files in the WebKit module. With 4 parallel compile jobs on a modern machine,
# the entire process takes roughly 30 minutes.
#######################################################################################

echo 'Install necessary packages'

sudo apt-get install build-essential g++ flex bison gperf ruby perl \
  libsqlite3-dev libfontconfig1-dev libicu-dev libfreetype6 libssl-dev \
  libpng-dev libjpeg-dev python libx11-dev libxext-dev

git clone --recurse-submodules git://github.com/ariya/phantomjs.git phantomjs-src
cd phantomjs-src
git checkout 2.0.0 --force
./build.sh

./phantomjs --webdriver=4444