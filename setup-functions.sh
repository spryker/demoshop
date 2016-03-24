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
TEAL=`tput setab 5` # background magenta
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

function setupText {
    echo -e "\n${TEAL}${COLOR}=> ${1} <=${NC}\n"
}

function writeErrorMessage {
    if [[ $? != 0 ]]; then
        errorText "${1}"
        errorText "Setup unsuccessful"
        exit 1
    fi
}

function createDevelopmentDatabase {
    # postgres
    sudo createdb DE_development_zed

    # mysql
    # mysql -u root -e "CREATE DATABASE DE_development_zed;"
}

function installDemoshop {
    labelText "Preparing new Demoshop installation..."
    sleep 1

    updateComposerBinary

    composerInstall

    resetDataStores

    dropDevelopmentDatabase $DATABASE_NAME

    setupText "Zed setup"

    vendor/bin/console setup:install $VERBOSITY
    writeErrorMessage "Setup install failed"

    labelText "Importing demo data"
    vendor/bin/console import:demo-data $VERBOSITY
    writeErrorMessage "DemoData import failed"

    labelText "Setting up data stores"
    vendor/bin/console collector:search:export $VERBOSITY
    vendor/bin/console collector:storage:export $VERBOSITY
    writeErrorMessage "DataStore setup failed"

    labelText "Setting up cronjobs"
    vendor/bin/console setup:jenkins:generate $VERBOSITY
    writeErrorMessage "Cronjob setup failed"

    labelText "Zed setup successful"

    setupText "Yves setup"

    resetYves

    . ./setup-frontend.sh

    labelText "Yves setup successful"

    labelText "Configuring test environment"
    vendor/bin/codecept build -q $VERBOSITY
    writeErrorMessage "Test configuration failed"

    successText "Setup successful"

    infoText "Yves url: http://www.de.spryker.dev/"
    infoText "Zed url: http://zed.de.spryker.dev/"
}

function resetDataStores {
    labelText "Flushing Elasticsearch"
    curl -XDELETE 'http://localhost:10005/de_development_catalog/'
    curl -XPUT 'http://localhost:10005/de_development_catalog/'
    vendor/bin/console setup:search
    writeErrorMessage "Elasticsearch reset failed"

    labelText "Flushing Redis"
    redis-cli -p 10009 FLUSHALL
    writeErrorMessage "Redis reset failed"
}

function installAntelope {
    labelText "Install Antelope tool globally"
    sudo $NPM install -g github:spryker/antelope
    ANTELOPE_TOOL=`which antelope`

    labelText "Test Antelope tool"
    $ANTELOPE_TOOL test
}

function resetDevelopmentState {
    labelText "Preparing to reset data..."
    sleep 1

    resetDataStores

    dropDevelopmentDatabase $DATABASE_NAME

    labelText "Generating Transfer Objects"
    vendor/bin/console transfer:generate
    writeErrorMessage "Generating Transfer Objects failed"

    labelText "Installing Propel"
    vendor/bin/console propel:install $VERBOSITY
    vendor/bin/console propel:diff $VERBOSITY
    vendor/bin/console propel:migrate $VERBOSITY
    writeErrorMessage "Propel setup failed"

    labelText "Initializing DB"
    vendor/bin/console setup:init-db $VERBOSITY
    writeErrorMessage "DB setup failed"
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

function updateComposerBinary {
    labelText "Setting up composer"

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

function composerInstall {
    labelText "Installing composer packages"
    $PHP composer.phar install --prefer-dist
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
    labelText "Spryker Platform Setup"
    echo "./$(basename $0) [OPTION] [VERBOSITY]"
    echo ""
    echo "  -i, --install-demo-shop"
    echo "      Install and setup new instance of Spryker Platform and populate it with demo data"
    echo " "
    echo "  -r, --reset"
    echo "      Reset state. Delete Redis, Elasticsearch and Database data"
    echo ""
    echo "  -h, --help"
    echo "      Show this help"
    echo "      This message will be displayed if any unrecognized option will be provided"
    echo ""
    echo "  -v, -vv, -vvv"
    echo "      Set verbosity level"
    echo " "
}
