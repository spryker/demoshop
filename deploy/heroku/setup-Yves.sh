#!/bin/bash

set -o pipefail

if [ $# -eq 0 ]; then
    echo "Use -i to install"
    exit 0
fi

SETUP='spryker'
CONSOLE=vendor/bin/console

. deploy/setup/util/print.sh
. deploy/setup/functions.sh
. deploy/setup/frontend/params.sh
. deploy/setup/frontend/params_heroku.sh
. deploy/setup/frontend/functions.sh
. deploy/setup/frontend/functions_heroku.sh


for arg in "$@"
do
    case $arg in
        "-i" )
            infoText "Run zed install in order to setup the DB"

            updateComposerBinary

            dumpAutoload

            setupYvesFrontend

            $CONSOLE transfer:generate
            $CONSOLE setup:search

            ;;
            *)
            echo "Use -i to install"
            ;;
   esac
done

exit 0
