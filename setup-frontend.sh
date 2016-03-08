#!/bin/bash

if [[ -z "$SETUP" ]]; then
    tput setab 1
    echo "Please do not run this script individually"
    tput sgr0
    exit 0
fi

SPY_TOOL=`which spy`

if [[ `node -v | grep -E '^v[0-4]'` ]]; then
    labelText "Upgrade Node.js"
    sudo $NPM cache clean -f
    sudo $NPM install -g n
    sudo n stable

    successText "Node.js updated to version `node -v`"
    successText "NPM updated to version `$NPM -v`"
fi

if [[ $RESET == 1 ]] || [[ ! -f $SPY_TOOL ]]; then
    labelText "Install SPY tool globally"
    $GIT clone --branch master git@github.com:spryker/spy.git /tmp/spy
    cd /tmp/spy
    sudo $NPM install -g ./
    cd $CWD
    rm -rf /tmp/spy
    SPY_TOOL=`which spy`
fi

$NPM install

if [[ -f $SPY_TOOL ]]; then
    labelText "SPY: test the project"
    $SPY_TOOL test

    labelText "SPY: install core dependencies"
    $SPY_TOOL install

    labelText "SPY: build the assets"
    $SPY_TOOL build
fi

successText "Setup Frontend completed succesfully"
