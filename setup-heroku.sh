#!/bin/bash

set -o pipefail

SETUP='spryker'

. ./setup-functions.sh

ELASTIC_SEARCH_URL=$BONSAI_URL

echo "ELASTIC_SEARCH_URL: $ELASTIC_SEARCH_URL"

function installElasticsearch {
    labelText "Flushing Elasticsearch"
    curl -XDELETE "$ELASTIC_SEARCH_URL/de_development_catalog/"
    curl -XPUT "$ELASTIC_SEARCH_URL/de_development_catalog/"
    vendor/bin/console setup:search
    writeErrorMessage "Elasticsearch reset failed"
}


for arg in "$@"
do
    case $arg in
        "-i" )
            installElasticsearch

            vendor/bin/console setup:install $VERBOSITY
            writeErrorMessage "Setup install failed"

            labelText "Importing Demo data"
            vendor/bin/console import:demo-data $VERBOSITY
            writeErrorMessage "DemoData import failed"

            labelText "Setting up data stores"
            vendor/bin/console collector:search:export $VERBOSITY
            vendor/bin/console collector:storage:export $VERBOSITY
            writeErrorMessage "DataStore setup failed"

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
