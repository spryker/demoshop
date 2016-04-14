#!/bin/bash

set -o pipefail

SETUP='spryker'

. ../functions.sh


if [ $# -eq 0 ]; then
    echo "Use -i to install"
    exit 0
fi

function installAntelope {
    if [[ -z "$SETUP" ]]; then
        tput setab 1
        echo "Please do not run this script individually"
        tput sgr0
        exit 0
    fi

    if [[ `node -v | grep -E '^v[0-4]'` ]]; then
        labelText "Upgrade Node.js"
        $NPM cache clean -f

        $NPM install -g n
        writeErrorMessage "NPM build failed"

        n stable

        successText "Node.js updated to version `node -v`"
        successText "NPM updated to version `$NPM -v`"
    fi

    labelText "Install Antelope tool globally"
    $NPM install -g antelope
    writeErrorMessage "Antelope setup failed"

    ANTELOPE_TOOL=`which antelope`

    if [[ -f $ANTELOPE_TOOL ]]; then
        labelText "Installing project dependencies"
        $ANTELOPE_TOOL install

        labelText "Building and optimizing assets"
        $ANTELOPE_TOOL build
        writeErrorMessage "Antelope build failed"
    fi
}

for arg in "$@"
do
    case $arg in
        "-i" )
            installAntelope
            ;;
            *)
            echo "Use -i to install"
            ;;
   esac
done

exit 0
