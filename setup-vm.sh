#!/bin/bash

SETUP='spryker'

. ./setup-functions.sh

if [[ `echo "$@" | grep '\-\-help'` ]] || [[ `echo "$@" | grep '\-h'` ]]; then
    displayHelp

    exit 0
fi

if [[ `echo "$@" | grep '\-\-delete'` ]] || [[ `echo "$@" | grep '\-d'` ]]; then
    cleanupDBRES

    exit 0
fi

if [[ ! -f "./composer.phar" ]]; then
    labelText "Download composer.phar"
    $CURL -sS https://getcomposer.org/installer | $PHP
fi

COMPOSER_TIMESTAMP=$(stat -c %Y "composer.phar")
CURRENT_TIMESTAMP=$(date +"%s")

COMPOSER_FILE_AGE=$(($CURRENT_TIMESTAMP-$COMPOSER_TIMESTAMP))
THIRTY_DAYS_AGE=$((60*60*24*30))

if [[ $COMPOSER_FILE_AGE > $THIRTY_DAYS_AGE ]]; then
    labelText "Install Composer Dependencies"
    $PHP composer.phar selfupdate
fi

if [[ $RESET == 1 ]]; then

    cleanupDBRES

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

labelText "Run composer install"
$PHP composer.phar install

labelText "Build Codeception dependency files"
vendor/bin/codecept build

labelText "Frontend assets management setup"
. ./setup-frontend.sh

labelText "Restart ElasticSearch"
sudo /etc/init.d/elasticsearch restart

labelText "setup:install"
vendor/bin/console setup:install -vvv

labelText "setup:install-demo-data"
vendor/bin/console setup:install-demo-data -vvv

labelText "collector:search:export"
vendor/bin/console collector:search:export -vvv

labelText "collector:storage:export"
vendor/bin/console collector:storage:export -vvv

labelText "setup:jenkins:generate"
vendor/bin/console setup:jenkins:generate -vvv

successText "Installation finished"

exit 0
