#!/bin/bash

if [[ -z "$SETUP" ]]; then
    tput setab 1
    echo "Please do not run this script individually"
    tput sgr0
    exit 0
fi

DATABASE_NAME='DE_development_zed'

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

if [[ `echo "$@" | grep '\-\-reset'` ]] || [[ `echo "$@" | grep '\-r'` ]]; then
    RESET=1
else
    RESET=0
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

function createDb {
    # postgres
    sudo createdb DE_development_zed

    # mysql
    # mysql -u root -e "CREATE DATABASE DE_development_zed;"
}

function cleanupDatabaseMemorySearch {
    labelText "Flushing Elastic Search"
    curl -XDELETE 'http://localhost:10005/de_development_catalog/'
    curl -XPUT 'http://localhost:10005/de_development_catalog/'
    writeErrorMessage "Flushing ES failed"

    labelText "Run setup:search command"
    vendor/bin/console setup:search

    labelText "Flushing Redis"
    redis-cli -p 10009 FLUSHALL
    writeErrorMessage "Flushing Redis failed"

    cleanupDatabase $DATABASE_NAME
}

function cleanupDatabase {
    PG_CTL_CLUSTER=`which pg_ctlcluster`
    DROP_DB=`which dropdb`
    if [[ -f $PG_CTL_CLUSTER ]] && [[ -f $DROP_DB ]]; then
        labelText "Deleting Postgres Database: ${1} "
        sudo pg_ctlcluster 9.4 main restart --force && sudo dropdb $1 2> /dev/null
        writeErrorMessage "Deleting DB command failed"
    fi

    MYSQL=`which mysql`
    if [[ -f $MYSQL ]]; then
        labelText "Drop MySQL database: ${1}"
        mysql -u root -e "DROP DATABASE IF EXISTS ${1};"
    fi
}

function displayHelp {
    labelText "Usage:"
    echo "  ./$(basename $0) [-h|--help] [-r|--reset] [-d|--delete]"
    echo " "
    echo "  Running script without any parameters will run normal setup process"
    echo " "
    echo "  -d|--delete"
    echo "      clear Redis, ElasticSearch, Drop database and stop script"
    echo " "
    echo "  -r|--reset"
    echo "      runs setup script with delete option"
    echo "      remove node_modules directory"
    echo "      delete cache directories from application"
    echo " "
    echo "  -h|--help"
    echo "      displays this message"
    echo " "


}
