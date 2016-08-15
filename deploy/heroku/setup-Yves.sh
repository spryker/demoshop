#!/bin/bash

set -o pipefail

if [ $# -eq 0 ]; then
    echo "Use -i to install"
    exit 0
fi

SETUP='spryker'
CONSOLE=vendor/bin/console

. deploy/setup/functions.sh


function installAntelope {
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
            $CONSOLE transfer:generate
            $CONSOLE setup:search
            $CONSOLE setup:generate-client-ide-auto-completion
            $CONSOLE setup:generate-ide-auto-completion
            $CONSOLE setup:generate-zed-ide-auto-completion

            updateComposerBinary

            dumpAutoload

            installAntelope
            ;;
            *)
            echo "Use -i to install"
            ;;
   esac
done

exit 0
