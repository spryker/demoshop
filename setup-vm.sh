#!/bin/bash

PHP=`which php`
CURL=`which curl`
NPM=`which npm`

if [[ ! -f "composer.phar" ]]; then
    echo "-> Download composer.phar"
    $CURL -sS https://getcomposer.org/installer | $PHP
fi

echo "-> Install Composer Dependencies (a github token will be required. Read screen instructions)"
$PHP composer.phar selfupdate
$PHP composer.phar install

NODEJS_VERSION=`node -v`

if [[ ! "$NODEJS_VERSION" =~ "[^5]" ]]; then
    echo "+ Upgrade node js"
    sudo $NPM cache clean -f
    sudo $NPM install -g n
    sudo n stable

    echo "=== NodeJS updated to version `node -v` ==="
    echo "=== NPM updated to version `$NPM -v`    ==="

    echo "-> Install Gulp Globally"
    sudo $NPM install -g gulp

    if [[ -d "node_modules" ]]; then
        echo "-> Remove node_modules and reinstall npm packages"
        rm -rf ./node_modules/
        $NPM install
    fi
fi


echo "-> Build-class-map"
vendor/bin/build-class-map

echo "-> setup:install"
vendor/bin/console setup:install -vvv

echo "-> setup:install-demo-data"
vendor/bin/console setup:install-demo-data -vvv

echo "-> collector:search:export"
vendor/bin/console collector:search:export -vvv

echo "-> collector:storage:export"
vendor/bin/console collector:storage:export -vvv
