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
eval "REDIS_URL=\$$REDIS_URL_NAME"

function resetElasticsearch {
    for store in "${STORES[@]}"
    do
        labelText "Flushing Elasticsearch: ${store}"
        curl -XDELETE "$ELASTIC_SEARCH_URL/${store}/"
        writeErrorMessage "Elasticsearch reset failed for ${store}"
    done
}

function resetRedis {
    if ! [ -x `which redis-cli` ]; then
        echo "redis-cli not found"
        exit 0
    fi

    local FIELDS=($(echo $REDIS_URL \
      | awk '{split($0, arr, /[\/\@:]*/); for (x in arr) { print arr[x] }}'))
    proto=${FIELDS[1]}
    user=${FIELDS[2]}
    host=${FIELDS[3]}
    port=$(  echo "${FIELDS[@]:3}" | awk '{print $2}' )

    echo "host: ${host}"
    echo "proto: ${proto}"
    echo "user: ${user}"
    echo "port: ${port}"

    echo "Executing FLUSHALL"
    redis-cli -h $host -p $port -a $user FLUSHALL
}

for arg in "$@"
do
    case $arg in
        "-i" )
            $CONSOLE setup:install $VERBOSITY
            writeErrorMessage "Setup install failed"

            labelText "Importing Demo data"
            $CONSOLE import:demo-data $VERBOSITY
            writeErrorMessage "DemoData import failed"

            labelText "Setting up data stores"
            $CONSOLE collector:search:export $VERBOSITY
            $CONSOLE collector:storage:export $VERBOSITY
            writeErrorMessage "DataStore setup failed"

            updateComposerBinary

            dumpAutoload

            ;;
       "-res" )
            resetElasticsearch
            ;;
       "-rrd" )
            resetRedis
            ;;
        *)
            echo "Use -i to install"
            ;;

   esac
done

exit 0
