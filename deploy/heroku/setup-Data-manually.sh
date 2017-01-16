#!/bin/bash

set -o pipefail

SETUP='spryker'
CONSOLE=vendor/bin/console
STORES=( de_search )

. deploy/setup/functions.sh

if [ $# -eq 0 ]; then
    echo "Use -i to install"
    exit 0
fi


function resetElasticsearch {
    for store in "${STORES[@]}"
    do
        labelText "Flushing Elasticsearch: ${store}"
        curl -XDELETE "$ELASTIC_SEARCH_URL/${store}/"
        writeErrorMessage "Elasticsearch reset failed for ${store}"
    done
}

function setupElasticsearch {
    for store in "${STORES[@]}"
    do
        labelText "Setting up Elasticsearch: ${store}"
        curl -XPOST $ELASTIC_SEARCH_URL/${store}/_close
        curl -XPUT $ELASTIC_SEARCH_URL/${store}/_settings -d '{"analysis":{"filter":{"fulltext_index_ngram_filter":{"type":"edge_ngram","min_gram":"2","max_gram":"20"}},"analyzer":{"fulltext_index_analyzer":{"filter":["lowercase","fulltext_index_ngram_filter"],"tokenizer":"standard"},"suggestion_analyzer":{"filter":["lowercase"],"tokenizer":"standard"},"completion_analyzer":{"filter":["lowercase"],"tokenizer":"keyword"},"fulltext_search_analyzer":{"filter":["lowercase"],"tokenizer":"standard"},"lowercase_keyword_analyzer":{"filter":["lowercase"],"tokenizer":"keyword"}}}}'
        curl -XPOST $ELASTIC_SEARCH_URL/${store}/_open
        writeErrorMessage "Elasticsearch setup failed for ${store}"
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
