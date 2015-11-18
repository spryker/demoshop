#!/bin/bash

PHP=`which php`
CURL=`which curl`
NPM=`which npm`

ERROR=`tput setab 1`
GREEN=`tput setab 2`
BACKGROUND=`tput setab 4`
COLOR=`tput setaf 7`
NC=`tput sgr0`

function labelText {
    echo -e "\n${BACKGROUND}${COLOR}-> ${1} ${NC}\n"
}

function errorText {
    echo -e "\n${ERROR}${COLOR}=> ${1} <=${NC}\n"
}

function successText {
    echo -e "\n${GREEN}${COLOR}=> ${1} <=${NC}\n"
}

function writeErrorMessage {
    if [[ $? != 0 ]]; then
        errorText "${1}"
    fi
}

COMPOSER_TIMESTAMP=$(stat -c %Y "composer.phar")
CURRENT_TIMESTAMP=$(date +"%s")

COMPOSER_FILE_AGE=$(($CURRENT_TIMESTAMP-$COMPOSER_TIMESTAMP))
THIRTY_DAYS_AGE=$((60*60*24*30))

if [[ ! -f "composer.phar" ]]; then
    labelText "Download composer.phar"
    $CURL -sS https://getcomposer.org/installer | $PHP
fi

if [[ `echo "$@" | grep '\-\-reset'` ]] || [[ `echo "$@" | grep '\-r'` ]]; then
    RESET=1
else
    RESET=0
fi

# Clear Redis
labelText "Clearing Redis"
redis-cli -p 10009 flushdb &> /dev/null
writeErrorMessage "Redis could not be cleaned"

labelText "Delete all indices on elasticsearch"
curl -XDELETE 'http://localhost:9200/_all' &> /dev/null
writeErrorMessage "ElasticSearch could not be cleaned"


if [[ $RESET == 1 ]]; then
    labelText "Drop Database"
    mysql -u root -e "DROP DATABASE DE_development_zed;"
    writeErrorMessage "Could not delete Database"

    labelText "Recreate Database"
    mysql -u root -e "CREATE DATABASE DE_development_zed;"
    writeErrorMessage "Could not create Database"

    if [[ -d "./node_modules" ]]; then
        labelText "Remove node_modules directory"
        rm -rf "./node_modules"
        writeErrorMessage "Could not remove node_modules directory"
    fi

    if [[ -d "./data/DE/logs" ]]; then
        labelText "Clear logs"
        rm -rf "./data/DE/logs"
        mkdir "./data/DE/logs"
        writeErrorMessage "Could not remove logs directory"
    fi

    if [[ -d "./data/DE/cache" ]]; then
        labelText "Clear cache"
        rm -rf "./data/DE/cache"
        writeErrorMessage "Could not remove cache directory"
    fi
fi

if [[ $COMPOSER_FILE_AGE > $THIRTY_DAYS_AGE ]]; then
    labelText "Install Composer Dependencies"
    $PHP composer.phar selfupdate
fi

labelText "Run composer install"
$PHP composer.phar install

labelText "Build Codeception dependency files"
vendor/bin/codecept build

if [[ `node -v | grep -E '^v[0-4]'` ]]; then
    labelText "Upgrade node js"
    sudo $NPM cache clean -f
    sudo $NPM install -g n
    sudo n stable

    successText "NodeJS updated to version `node -v`"
    successText "NPM updated to version `$NPM -v`"

    labelText "Install Gulp Globally"
    sudo $NPM install -g gulp

    if [[ -d "./node_modules" ]]; then
        labelText "Remove node_modules directory"
        rm -rf "./node_modules"
    fi
fi

labelText "Install npm modules"
$NPM install

labelText "Restart ElasticSearch"
sudo /etc/init.d/elasticsearch restart

labelText "Build-class-map"
vendor/bin/build-class-map

labelText "setup:install"
vendor/bin/console setup:install -vvv

labelText "setup:install-demo-data"
vendor/bin/console setup:install-demo-data -vvv

labelText "collector:search:export"
vendor/bin/console collector:search:export -vvv

labelText "collector:storage:export"
vendor/bin/console collector:storage:export -vvv

successText "Installation finished"

exit 0
