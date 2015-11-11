#!/bin/bash

PHP=`which php`
CURL=`which curl`
NPM=`which npm`

TC_RESET=$'\x1B[0m'
TC_SKY=$'\x1B[0;37;44m'
CLREOL=$'\x1B[K'

function labelText {
    echo $TC_RESET
    echo -n "${TC_SKY}${CLREOL}"
    echo -e "\n${1}${CLREOL}"
    echo ${CLREOL}
    echo $TC_RESET
}

if [[ ! -f "composer.phar" ]]; then
    labelText "-> Download composer.phar"
    $CURL -sS https://getcomposer.org/installer | $PHP
fi

labelText "-> Install Composer Dependencies"
$PHP composer.phar selfupdate
$PHP composer.phar install

if [[ `node -v | grep -E '^v[0-4]'` ]]; then
    labelText "+ Upgrade node js"
    sudo $NPM cache clean -f
    sudo $NPM install -g n
    sudo n stable

    labelText "=== NodeJS updated to version `node -v` ==="
    labelText "=== NPM updated to version `$NPM -v`    ==="

    labelText "-> Install Gulp Globally"
    sudo $NPM install -g gulp

    if [[ -d "node_modules" ]]; then
        labelText "-> Remove node_modules and reinstall npm packages"
        rm -rf ./node_modules/
        $NPM install
    fi
fi

labelText "-> Build-class-map"
vendor/bin/build-class-map -vvv

labelText "-> setup:install"
vendor/bin/console setup:install -vvv

labelText "-> setup:install-demo-data"
vendor/bin/console setup:install-demo-data -vvv

labelText "-> collector:search:export"
vendor/bin/console collector:search:export -vvv

labelText "-> collector:storage:export"
vendor/bin/console collector:storage:export -vvv

labelText "-> Installation finished"

exit 0
