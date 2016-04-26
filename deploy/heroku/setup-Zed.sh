#!/bin/bash

set -o pipefail

SETUP='spryker'
. deploy/setup/functions.sh

CONSOLE=vendor/bin/console

if [ $# -eq 0 ]; then
    echo "Use -i to install"
    exit 0
fi

ELASTIC_SEARCH_URL=$BONSAI_URL

function resetElasticsearch {
    labelText "Flushing Elasticsearch"
    curl -XDELETE "$ELASTIC_SEARCH_URL/de_development_catalog/"
    curl -XPUT "$ELASTIC_SEARCH_URL/de_development_catalog/"
    $CONSOLE setup:search
    writeErrorMessage "Elasticsearch reset failed"
}

for arg in "$@"
do
    case $arg in
        "-i" )
            resetElasticsearch

            $CONSOLE setup:install $VERBOSITY
            writeErrorMessage "Setup install failed"

            labelText "Importing Demo data"
            $CONSOLE import:demo-data $VERBOSITY
            writeErrorMessage "DemoData import failed"

            labelText "Setting up data stores"
            $CONSOLE collector:search:export $VERBOSITY
            $CONSOLE collector:storage:export $VERBOSITY
            writeErrorMessage "DataStore setup failed"

            ./deploy/heroku/setup-Yves.sh -i

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
