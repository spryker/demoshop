#!/bin/bash

if [[ -z "$SETUP" ]]; then
    tput setab 1
    echo "Please do not run this script individually"
    tput sgr0
    exit 0
fi

ANTELOPE_TOOL=`which antelope`

if [[ `node -v | grep -E '^v[0-4]'` ]]; then
    labelText "Upgrade Node.js"
    sudo $NPM cache clean -f
    sudo $NPM install -g n
    sudo n stable

    successText "Node.js updated to version `node -v`"
    successText "NPM updated to version `$NPM -v`"
fi

if [[ ! -f $ANTELOPE_TOOL ]]; then
    installAntelope
fi

if [[ -f $ANTELOPE_TOOL ]]; then
    labelText "Install frontend core dependencies"
    $ANTELOPE_TOOL install
fi

labelText "Install frontend project dependencies"
$NPM install

if [[ -f $ANTELOPE_TOOL ]]; then
    labelText "Build and optimize assets"
    $ANTELOPE_TOOL build
fi

