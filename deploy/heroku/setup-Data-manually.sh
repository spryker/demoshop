#!/bin/bash

set -o pipefail

SETUP='spryker'
CONSOLE=vendor/bin/console
STORES=( de_search )

. deploy/setup/util/print.sh
. deploy/setup/functions.sh

if [ $# -eq 0 ]; then
    echo "Use -i to install"
    exit 0
fi

eval "ELASTIC_SEARCH_URL=\$$ELASTIC_SEARCH_URL_NAME"


function resetElasticsearch {
    for store in "${STORES[@]}"
    do
        labelText "Flushing Elasticsearch: ${store}"
        curl -XDELETE "$ELASTIC_SEARCH_URL/${store}/"
        writeErrorMessage "Elasticsearch reset failed for ${store}"
    done
}

for arg in "$@"
do
    case $arg in
        "-i" )
            resetElasticsearch

            $CONSOLE setup:install $VERBOSITY
            writeErrorMessage "Setup install failed"

            setupElasticsearch

            labelText "Importing Demo data"
            $CONSOLE import:demo-data $VERBOSITY
            writeErrorMessage "DemoData import failed"

            labelText "Setting up data stores"
            $CONSOLE collector:search:export $VERBOSITY
            $CONSOLE collector:storage:export $VERBOSITY
            writeErrorMessage "DataStore setup failed"

            updateComposerBinary

            dumpAutoload

            #labelText "Setting up cronjobs"
            #vendor/bin/console setup:jenkins:generate $VERBOSITY
            #writeErrorMessage "Cronjob setup failed"
            ;;
            *)
            echo "Use -i to install"
            ;;
   esac
done

exit 0
