#!/bin/bash

CURL=`which curl`
NPM=`which npm`
GIT=`which git`

CWD=`pwd`
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

if [[ `node -v | grep -E '^v[0-4]'` ]]; then
    labelText "Upgrade Node.js"
    sudo $NPM cache clean -f
    sudo $NPM install -g n
    sudo n stable

    successText "Node.js updated to version `node -v`"
    successText "NPM updated to version `$NPM -v`"
fi

labelText "Install webpack globally"
sudo $NPM install -g webpack@"^1.12.14"

labelText "Install SPY tool globally"
$GIT clone --branch master git@github.com:spryker/spy.git /tmp/spy
cd /tmp/spy
sudo $NPM install -g ./
cd $CWD
rm -rf /tmp/spy

labelText "Install npm project dependecies"
if [[ -d "./node_modules" ]]; then
    echo "Project old 'node_modules' directory removed"
    rm -rf "./node_modules"
fi
$NPM install

SPY_TOOL=`which spy`

if [[ -f $SPY_TOOL ]]; then
    labelText "SPY: test the project"
    $SPY_TOOL test

    labelText "SPY: install core dependencies"
    $SPY_TOOL install

    labelText "SPY: build the assets"
    $SPY_TOOL build
fi

successText "Setup completed succesfully"

exit 0
