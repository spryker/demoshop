#!/bin/bash

set -o pipefail


SETUP='spryker'
DATABASE_NAME='DE_test_zed'
DATABASE_USER='development'
DATABASE_PASSWORD='mate20mg'
VERBOSITY='-v'
CONSOLE=vendor/bin/console
PHANTOMJS_CDNURL='https://github.com/Medium/phantomjs/'
export APPLICATION_ENV='test'

. deploy/setup/functions.sh

warningText "This script should be used only in development and NEVER IN PRODUCTION"


function installTestingEnv {

    # zed
    labelText "Flushing Elasticsearch de_search_test"
    curl -XDELETE 'http://localhost:10005/de_search_test/'
    writeErrorMessage "Elasticsearch reset failed"

    labelText "Flushing Redis db 3"
    echo -e "select 3\nflushdb" | redis-cli -p 10009
    writeErrorMessage "Redis reset failed"

    dropDevelopmentDatabase

    $CONSOLE setup:install $VERBOSITY
    writeErrorMessage "Setup install failed"

    $CONSOLE propel:install $VERBOSITY
    $CONSOLE propel:diff $VERBOSITY
    $CONSOLE propel:migrate $VERBOSITY

    labelText "Initializing DB"
    $CONSOLE setup:init-db $VERBOSITY
    writeErrorMessage "DB setup failed"

    labelText "Setting up data stores"
    $CONSOLE collector:search:export $VERBOSITY
    $CONSOLE collector:storage:export $VERBOSITY
    writeErrorMessage "DataStore setup failed"


    # backup
    dumpDevelopmentDatabase "data/test.backup"

    labelText "Backup redis to data/test.backup"
    echo -e "select 3\nsave" | redis-cli -p 10009

    labelText "Backup elastic search"
    curl -XPUT http://localhost:10005/_snapshot/test -d '{"type":"fs","settings":{"location":"test","compress":true}}'
    curl -XPUT http://localhost:10005/_snapshot/test/de_search_test -d '{"indicies":"de_search_test"}'

    #---

    #antelopeInstallZed

    sleep 1

    # yves
    #installYves

    configureCodeception

    successText "Setup successful"
    infoText "\nYves URL: http://www.de.spryker.dev/\nZed URL: http://zed.de.spryker.dev/\n"
}

if [ $# -eq 0 ]; then
    displayHelp
    exit 0
fi

for arg in "$@"
do
    case $arg in

         "--test" | "-t" )
           installTestingEnv
           ;;
        *)
            displayHeader
            echo ""
            echo "Unrecognized option: $@. Use -h to display help."
            exit 1
        ;;
   esac
done




exit 0
