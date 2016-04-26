#!/bin/bash

if [[ -z "$SETUP" ]]; then
    tput setab 1
    echo "Please do not run this script individually"
    tput sgr0
    exit 0
fi

DATABASE_NAME='DE_development_zed'
VERBOSITY='-v'

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
    CHANGES=`git status | grep "# Changes not staged for commit"`
    if [ "x$CHANGES" != "x" ]; then
        errorText "Uncommitted changes detected. Stash or commit your changes first"
        exit 1
    fi

    labelText "Preparing to install Spryker Platform..."
    sleep 1

    updateComposerBinary

    composerInstall

    installZed

    installYves

    configureCodeception

    optimizeRepo

    successText "Setup successful"

    infoText "Yves url: http://www.de.spryker.dev/"
    infoText "Zed url: http://zed.de.spryker.dev/"
}

function installZed {
    setupText "Zed setup"

    resetDataStores

    dropDevelopmentDatabase

    $CONSOLE setup:install $VERBOSITY
    writeErrorMessage "Setup install failed"

    labelText "Importing Demo data"
    $CONSOLE import:demo-data $VERBOSITY
    writeErrorMessage "DemoData import failed"

    labelText "Setting up data stores"
    $CONSOLE collector:search:export $VERBOSITY
    $CONSOLE collector:storage:export $VERBOSITY
    writeErrorMessage "DataStore setup failed"

    labelText "Setting up cronjobs"
    $CONSOLE setup:jenkins:generate $VERBOSITY
    writeErrorMessage "Cronjob setup failed"

    labelText "Zed setup successful"
}

function installYves {
    setupText "Yves setup"

    resetYves

    . deploy/setup/setup-frontend.sh

    labelText "Yves setup successful"
}

function configureCodeception {
    labelText "Configuring test environment"
    vendor/bin/codecept build -q $VERBOSITY
    writeErrorMessage "Test configuration failed"
}

function optimizeRepo {
    labelText "Optimizing repository"
    git gc              # garbage collector
    git prune           # kills loose garbage
    writeErrorMessage "Repository optimization failed"
}

function resetDataStores {
    labelText "Flushing Elasticsearch"
    curl -XDELETE 'http://localhost:10005/de_development_catalog/'
    curl -XPUT 'http://localhost:10005/de_development_catalog/'
    $CONSOLE setup:search
    writeErrorMessage "Elasticsearch reset failed"

    labelText "Flushing Redis"
    redis-cli -p 10009 FLUSHALL
    writeErrorMessage "Redis reset failed"
}

function resetDevelopmentState {
    labelText "Preparing to reset data..."
    sleep 1

    resetDataStores

    dropDevelopmentDatabase

    labelText "Generating Transfer Objects"
    $CONSOLE transfer:generate
    writeErrorMessage "Generating Transfer Objects failed"

    labelText "Installing Propel"
    $CONSOLE propel:install $VERBOSITY
    $CONSOLE propel:diff $VERBOSITY
    $CONSOLE propel:migrate $VERBOSITY
    writeErrorMessage "Propel setup failed"

    labelText "Initializing DB"
    $CONSOLE setup:init-db $VERBOSITY
    writeErrorMessage "DB setup failed"
}

function dropDevelopmentDatabase {
    if [ `sudo psql -l | grep ${DATABASE_NAME} | wc -l` -ne 0 ]; then

        PG_CTL_CLUSTER=`which pg_ctlcluster`
        DROP_DB=`which dropdb`

        if [[ -f $PG_CTL_CLUSTER ]] && [[ -f $DROP_DB ]]; then
            labelText "Deleting PostgreSql Database: ${DATABASE_NAME} "
            sudo pg_ctlcluster 9.4 main restart --force && sudo dropdb $DATABASE_NAME 1>/dev/null
            writeErrorMessage "Deleting DB command failed"
        fi
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

function displayHeader {
    labelText "Spryker Platform Setup"
    echo "./$(basename $0) [OPTION] [VERBOSITY]"
}

function displayHelp {

    displayHeader

    echo ""
    echo "  -i, --install-demo-shop"
    echo "      Install and setup new instance of Spryker Platform and populate it with Demo data"
    echo " "
    echo "  -iy, --install-yves"
    echo "      (re)Install Yves only"
    echo " "
    echo "  -iz, --install-zed"
    echo "      (re)Install Zed only"
    echo " "
    echo "  -r, --reset"
    echo "      Reset state. Delete Redis, Elasticsearch and Database data"
    echo ""
    echo "  -h, --help"
    echo "      Show this help"
    echo ""
    echo "  -v, -vv, -vvv"
    echo "      Set verbosity level"
    echo " "
}
