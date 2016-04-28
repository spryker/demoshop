#!/bin/bash

set -o pipefail

SETUP='spryker'
. deploy/setup/functions.sh

if [ $# -eq 0 ]; then
    echo "Use -i to install"
    exit 0
fi


for arg in "$@"
do
    case $arg in
        "-i" )
            $CONSOLE setup:install $VERBOSITY
            writeErrorMessage "Setup install failed"

            updateComposerBinary

            dumpAutoload

            ./deploy/heroku/setup-Yves.sh -i
            ;;
            *)
            echo "Use -i to install"
            ;;
   esac
done

exit 0
