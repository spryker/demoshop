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
            infoText "Run zed install in order to setup the DB"

            updateComposerBinary

            dumpAutoload

            antelopeInstallYves

            $CONSOLE transfer:generate
            $CONSOLE setup:search

            ;;
            *)
            echo "Use -i to install"
            ;;
   esac
done

exit 0
