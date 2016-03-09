#!/bin/bash

if [[ -z "$SETUP" ]]; then
    tput setab 1
    echo "Please do not run this script individually"
    tput sgr0
    exit 0
fi

CURL=`which curl`
NPM=`which npm`
GIT=`which git`
PHP=`which php`

CWD=`pwd`

ERROR=`tput setab 1`
GREEN=`tput setab 2`
BACKGROUND=`tput setab 4`
COLOR=`tput setaf 7`
NC=`tput sgr0`

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

function successText {
    echo -e "\n${GREEN}${COLOR}=> ${1} <=${NC}\n"
}

function writeErrorMessage {
    if [[ $? != 0 ]]; then
        errorText "${1}"
    fi
}

function dropDatabase {
    # postgres
    labelText "Drop PostgreSQL database"
    sudo pg_ctlcluster 9.4 main restart --force
    sudo dropdb DE_development_zed

    # mysql
    # labelText "Drop MySQL database"
    # mysql -u root -e "DROP DATABASE DE_development_zed;"
}

function createDb {
    # postgres
    sudo createdb DE_development_zed

    # mysql
    # mysql -u root -e "CREATE DATABASE DE_development_zed;"
}

function cleanupDBRES {
    labelText "Flushing Elastic Search"
    curl -XDELETE 'http://localhost:10005/de_development_catalog/'
    curl -XPUT 'http://localhost:10005/de_development_catalog/'
    writeErrorMessage "Flushing ES failed"

    labelText "Run setup:search command"
    vendor/bin/console setup:search

    labelText "Flushing Redis"
    redis-cli -p 10009 FLUSHALL
    writeErrorMessage "Flushing Redis failed"

    labelText "Deleting DB"
    sudo pg_ctlcluster 9.4 main restart --force && sudo dropdb DE_development_zed
    writeErrorMessage "Deleting DB command failed"
}
