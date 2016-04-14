#!/bin/bash

if [[ -z "$SETUP" ]]; then
    tput setab 1
    echo "Please do not run this script individually"
    tput sgr0
    exit 0
fi

if [[ `node -v | grep -E '^v[0-4]'` ]]; then
    labelText "Upgrade Node.js"
    sudo $NPM cache clean -f

    sudo $NPM install -g n
    writeErrorMessage "NPM build failed"

    sudo n stable

    successText "Node.js updated to version `node -v`"
    successText "NPM updated to version `$NPM -v`"
fi

labelText "Install Antelope tool globally"
sudo $NPM install -g antelope
writeErrorMessage "Antelope setup failed"

ANTELOPE_TOOL=`which antelope`

if [[ -f $ANTELOPE_TOOL ]]; then
    labelText "Installing project dependencies"
    $ANTELOPE_TOOL install

    labelText "Building and optimizing assets"
    $ANTELOPE_TOOL build
    writeErrorMessage "Antelope build failed"
fi

