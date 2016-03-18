#!/bin/bash

if [[ -z "$SETUP" ]]; then
    tput setab 1
    echo "Please do not run this script individually"
    tput sgr0
    exit 0
fi

DATABASE_NAME='DE_development_zed'
VERBOSITY=''

CURL=`which curl`
NPM=`which npm`
GIT=`which git`
PHP=`which php`
CWD=`pwd`

ERROR=`tput setab 1` # background red
GREEN=`tput setab 2` # background green
BACKGROUND=`tput setab 4` # background blue
INFO=`tput setaf 3` # yellow text
COLOR=`tput setaf 7` # text white
NC=`tput sgr0` # reset

if [[ `echo "$@" | grep '\-v'` ]]; then
    VERBOSITY='-v'
fi

if [[ `echo "$@" | grep '\-vv'` ]]; then
    VERBOSITY='-vv'
fi

if [[ `echo "$@" | grep '\-vvv'` ]]; then
    VERBOSITY='-vvv'
fi

function labelText {
    echo -e "\n${BACKGROUND}${COLOR}-> ${1} ${NC}\n"
}

function errorText {
    echo -e "\n${ERROR}${COLOR}=> ${1} <=${NC}\n"
}

function infoText {
    echo -e "\n${INFO}=> ${1} <=${NC}\n"
}

function successText {
    echo -e "\n${GREEN}${COLOR}=> ${1} <=${NC}\n"
}

function writeErrorMessage {
    if [[ $? != 0 ]]; then
        errorText "${1}"
    fi
}

function createDevelopmentDatabase {
    # postgres
    sudo createdb DE_development_zed

    # mysql
    # mysql -u root -e "CREATE DATABASE DE_development_zed;"
}

function installDemoshop {
    labelText "Preparing new Demoshop instalation..."
    sleep 2

    updateComposer

    resetDataStores

    dropDevelopmentDatabase $DATABASE_NAME

    labelText "Zed setup"
    vendor/bin/console setup:install $VERBOSITY
    writeErrorMessage "Failed"

    labelText "Importing DemoData"
    vendor/bin/console import:icecat-data $VERBOSITY
    writeErrorMessage "Failed"

    labelText "Setting up Data Stores"
    vendor/bin/console collector:search:export $VERBOSITY
    vendor/bin/console collector:storage:export $VERBOSITY
    writeErrorMessage "Failed"

    labelText "Setting up Cronjobs"
    #vendor/bin/console setup:jenkins:generate $VERBOSITY
    writeErrorMessage "Failed"

    labelText "Zed setup successful"

    labelText "Yves setup"

    resetYves

    . ./setup-frontend.sh

    labelText "Yves setup successful"

    labelText "Configuring Test environment"
    vendor/bin/codecept build -q $VERBOSITY

    successText "Setup successful"

    infoText "Yves url: http://www.de.spryker.dev/"
    infoText "Zed url: http://zed.de.spryker.dev/"
}

function resetDataStores {
    labelText "Flushing Elasticsearch"
    curl -XDELETE 'http://localhost:10005/de_development_catalog/'
    curl -XPUT 'http://localhost:10005/de_development_catalog/'
    vendor/bin/console setup:search
    writeErrorMessage "Failed"

    labelText "Flushing Redis"
    redis-cli -p 10009 FLUSHALL
    writeErrorMessage "Failed"
}

function resetDevelopmentState {
    resetDataStores

    dropDevelopmentDatabase $DATABASE_NAME

    labelText "Generating Transfer Objects"
    vendor/bin/console transfer:generate
    writeErrorMessage "Failed"

    labelText "Installing Propel"
    vendor/bin/console propel:install $VERBOSITY
    vendor/bin/console propel:diff $VERBOSITY
    vendor/bin/console propel:migrate $VERBOSITY

    labelText "Initializing DB"
    vendor/bin/console setup:init-db $VERBOSITY
}

function dropDevelopmentDatabase {
    PG_CTL_CLUSTER=`which pg_ctlcluster`
    DROP_DB=`which dropdb`
    if [[ -f $PG_CTL_CLUSTER ]] && [[ -f $DROP_DB ]]; then
        labelText "Deleting PostgreSql Database: ${1} "
        sudo pg_ctlcluster 9.4 main restart --force && sudo dropdb $1 2> /dev/null
        writeErrorMessage "Deleting DB command failed"
    fi

    # MYSQL=`which mysql`
    # if [[ -f $MYSQL ]]; then
    #    labelText "Drop MySQL database: ${1}"
    #    mysql -u root -e "DROP DATABASE IF EXISTS ${1};"
    # fi
}

function updateComposer {
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
}

function resetYves {
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
}


function displayHelp {
    labelText "Spryker VM Setup"
    echo "./$(basename $0) [-h|--help] [-r|--reinstall] [-d|--delete]"
    echo ""
    echo " "
    echo "  -r|--reset"
    echo "      Reset Demoshop state. Delete Redis, Elasticsearch and Database data."
    echo " "
    echo "  -i|--install"
    echo "      Install Demoshop from scratch."
    echo " "
    echo "  -h|--help"
    echo "      Show this help"
    echo " "


}
