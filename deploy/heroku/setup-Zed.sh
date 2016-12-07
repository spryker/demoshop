#!/bin/bash

set -o pipefail

if [ $# -eq 0 ]; then
    echo "Use -i to install"
    exit 0
fi

SETUP='spryker'
CONSOLE=vendor/bin/console

. deploy/setup/functions.sh

. deploy/heroku/functions.sh


for arg in "$@"
do
    case $arg in
        "-i" )
            $CONSOLE setup:install $VERBOSITY
            writeErrorMessage "Setup install failed"

            updateComposerBinary

            dumpAutoload

            antelopeInstallZed
            ;;
            *)
            echo "Use -i to install"
            ;;
   esac
done

exit 0
