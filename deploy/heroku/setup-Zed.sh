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
            infoText "After the code has been deployed, run setup-Data-manually.sh"
            # $CONSOLE setup:install $VERBOSITY
            # writeErrorMessage "Setup install failed"

            updateComposerBinary

            dumpAutoload

            infoText "Transfer generate"
            $CONSOLE transfer:generate $VERBOSITY
            writeErrorMessage "transfer:generate failed"

            infoText "Building navigation cache"
            $CONSOLE application:build-navigation-cache $VERBOSITY
            writeErrorMessage "application:build-navigation-cache failed"

            infoText "Setup search"
            $CONSOLE setup:search $VERBOSITY
            writeErrorMessage "setup:search failed"

            infoText "Propel config convert"
            $CONSOLE propel:config:convert $VERBOSITY
            writeErrorMessage "propel:config:convert failed"

            infoText "Propel schema copy"
            $CONSOLE propel:schema:copy $VERBOSITY
            writeErrorMessage "propel:schema:copy failed"

            infoText "Propel model build"
            $CONSOLE propel:model:build $VERBOSITY
            writeErrorMessage "propel:model:build failed"

            antelopeInstallZed
            ;;
            *)
            echo "Use -i to install"
            ;;
   esac
done

exit 0
