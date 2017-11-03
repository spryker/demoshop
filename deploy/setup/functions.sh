#!/bin/bash

# [!] include deploy/setup/util/print.sh before this file
# [!] include deploy/setup/params.sh before this file
# [!] include deploy/setup/frontend/params.sh with this file
# [!] include deploy/setup/frontend/function.sh with this file
# provide deploy functions

if [[ -z "$SETUP" ]]; then
    tput setab 1
    echo "Please do not run this script individually"
    tput sgr0
    exit 0
fi

CURL=`which curl`
NPM=`which npm`
GIT=`which git`
PHP=`which php`
PG_VERSION=$(psql --version | awk '{print $3}' | cut -f1,2 -d'.')

if [[ `echo "$@" | grep '\-v'` ]]; then
    VERBOSITY='-v'
fi

if [[ `echo "$@" | grep '\-vv'` ]]; then
    VERBOSITY='-vv'
fi

if [[ `echo "$@" | grep '\-vvv'` ]]; then
    VERBOSITY='-vvv'
fi

function deleteDevelopmentQueues {
    labelText "Deleting RabbitMQ Queues/Exchanges "
    curl -s -u ${RABBITMQ_USER}:${RABBITMQ_PASS} http://${RABBITMQ_HOST}:${RABBITMQ_WEB_PORT}/api/queues/ | grep -Po '"name":.*?[^\\]"' | awk  -F "\"" '{print $4}' | while read queue; do curl -s -u ${RABBITMQ_USER}:${RABBITMQ_PASS} -XDELETE http://${RABBITMQ_HOST}:${RABBITMQ_WEB_PORT}/api/queues/%2F${RABBITMQ_VHOST}/${queue};echo ${queue} queue has deleted.; done

    for item in ${RABBITMQ_EXCHANGE[*]}
    do
        curl -s -u ${RABBITMQ_USER}:${RABBITMQ_PASS} -XDELETE http://${RABBITMQ_HOST}:${RABBITMQ_WEB_PORT}/api/exchanges/%2F${RABBITMQ_VHOST}/$item | grep name || true
    done
}

function purgeAllQueues {
    labelText "Resetting RabbitMQ Queues"
    curl -s -u ${RABBITMQ_USER}:${RABBITMQ_PASS} http://${RABBITMQ_HOST}:${RABBITMQ_WEB_PORT}/api/queues/ | grep -Po '"name":.*?[^\\]"' | awk  -F "\"" '{print $4}' | while read queue; do curl -s -u ${RABBITMQ_USER}:${RABBITMQ_PASS} -XDELETE http://${RABBITMQ_HOST}:${RABBITMQ_WEB_PORT}/api/queues/%2F${RABBITMQ_VHOST}/${queue}/contents;echo ${queue} queue has purged.; done
}


function generateTwigCacheFiles {
    labelText "Generating twig cache files"
    vendor/bin/console twig:cache:warmer
    writeErrorMessage "Cache WarmUp failed"
}

function createDevelopmentDatabase {
    if [[ $DATABASE_ENGINE == "mysql" ]] || [[ ${DATABASE_DEFAULT_ENGINE} == "mysql" ]]; then
        mysql -u root -e "CREATE DATABASE DE_development_zed;"
    else
        sudo createdb ${DATABASE_NAME}
    fi
}

function dumpDevelopmentDatabase {
    export PGPASSWORD=$DATABASE_PASSWORD
    export LC_ALL="en_US.UTF-8"

    if [[ -z "$1" ]]; then
          DATABASE_BACKUP_PATH=$DATABASE_NAME.backup;
    else
          DATABASE_BACKUP_PATH=$1
    fi

    if [[ $DATABASE_ENGINE == "mysql" ]] || [[ ${DATABASE_DEFAULT_ENGINE} == "mysql" ]]; then
        mysqldump -i -u${DATABASE_USER} -p${DATABASE_PASSWORD} ${DATABASE_NAME} > ${DATABASE_BACKUP_PATH}
    else
        pg_dump -i -h 127.0.0.1 -U $DATABASE_USER  -F c -b -v -f  $DATABASE_BACKUP_PATH $DATABASE_NAME
    fi
}

function restoreDevelopmentDatabase {
    read -r -p "Restore database ${DATABASE_NAME} ? [y/N] " response
    case $response in
        [yY][eE][sS]|[yY])
            dropAndRestoreDatabase
            ;;
        *)
            echo "Nothing done."
            ;;
    esac
}

function dropAndRestoreDatabase {
    if [[ -z "$1" ]]; then
          DATABASE_BACKUP_PATH=$DATABASE_NAME.backup;
    else
          DATABASE_BACKUP_PATH=$1
    fi

    export PGPASSWORD=$DATABASE_PASSWORD
    export LC_ALL="en_US.UTF-8"

    if [[ $DATABASE_ENGINE == "mysql" ]] || [[ ${DATABASE_DEFAULT_ENGINE} == "mysql" ]]; then
        mysql -u${DATABASE_USER} -p${DATABASE_PASSWORD} -e "DROP DATABASE IF EXISTS ${DATABASE_NAME};"
        mysql -u${DATABASE_USER} -p${DATABASE_PASSWORD} -e "CREATE DATABASE ${DATABASE_NAME};"
        mysql -u${DATABASE_USER} -p${DATABASE_PASSWORD} ${DATABASE_NAME} < ${DATABASE_BACKUP_PATH}
    else
        sudo pg_ctlcluster $PG_VERSION main restart --force
        sudo dropdb $DATABASE_NAME
        sudo createdb $DATABASE_NAME
        pg_restore -i -h 127.0.0.1 -p 5432 -U $DATABASE_USER -d $DATABASE_NAME -v $DATABASE_BACKUP_PATH
    fi
}

function installDemoshop {
    labelText "Preparing to install Spryker Platform..."

    updateComposerBinary

    if [ "$1" == "-i" ]; then
         composerInstall
    fi

    installZed
    sleep 1
    installYves

    generateTwigCacheFiles

    successText "Setup successful"
}

function installZed {
    setupText "Zed setup"

    labelText "Stopping jenkins"
    $CONSOLE setup:jenkins:disable $VERBOSITY --no-post
    writeErrorMessage "Failed to stop jenkins"

    resetDataStores

    deleteDevelopmentQueues

    dropDevelopmentDatabase

    $CONSOLE setup:install $VERBOSITY
    writeErrorMessage "Setup install failed"

    labelText "Importing Data"
    $CONSOLE data:import $VERBOSITY
    writeErrorMessage "Importing Data failed"

    labelText "Updating product label relations"
    $CONSOLE product-label:relations:update $VERBOSITY
    writeErrorMessage "Updating product label relations failed"

    labelText "Purge All Queues"
    purgeAllQueues

    labelText "Setting up data stores"

    $CONSOLE collector:search:export $VERBOSITY
    $CONSOLE collector:storage:export $VERBOSITY
    writeErrorMessage "DataStore setup failed"

    labelText "Setting up cronjobs"
    $CONSOLE setup:jenkins:enable $VERBOSITY
    $CONSOLE setup:jenkins:generate $VERBOSITY
    writeErrorMessage "Cronjob setup failed"

    labelText "Setting up IDE autocompletion"
    $CONSOLE dev:ide:generate-auto-completion $VERBOSITY

    removeLogFiles

    setupZedFrontend

    labelText "Zed setup completed successfully"
}

function removeLogFiles {
    if [[ -d "./data/DE/logs" ]]; then
        labelText "Clear logs"
        sudo service filebeat stop || true
        /bin/bash -c 'rm -rf ./data/DE/logs/*'
        sudo service filebeat start || true
        writeErrorMessage "Could not remove logs directory"
    fi
}

function removeCacheFiles {
    if [[ -d "./data/DE/cache" ]]; then
        labelText "Clear cache"
        /bin/bash -c 'rm -rf ./data/DE/cache/*'
        writeErrorMessage "Could not remove cache directory"
    fi
}

function installYves {
    setupText "Yves setup"

    setupYvesFrontend

    labelText "Yves setup completed successfully"
}

function optimizeRepo {
    labelText "Optimizing repository"
    git gc              # garbage collector
    git prune           # kills loose garbage
    writeErrorMessage "Repository optimization failed"
}

function resetDataStores {
    labelText "Flushing Elasticsearch index ${ELASTIC_SEARCH_INDEX}"
    curl -XDELETE 'http://localhost:'${ELASTIC_SEARCH_PORT}'/'${ELASTIC_SEARCH_INDEX}'/'
    writeErrorMessage "Elasticsearch reset failed"

    labelText "Flushing Redis"
    redis-cli -p $REDIS_PORT FLUSHALL
    writeErrorMessage "Redis reset failed"
}

function resetDevelopmentState {
    labelText "Preparing to reset data..."
    sleep 1

    resetDataStores

    deleteDevelopmentQueues

    dropDevelopmentDatabase

    labelText "Generating Transfer Objects"
    $CONSOLE transfer:generate --no-post
    writeErrorMessage "Generating Transfer Objects failed"

    $CONSOLE setup:install $VERBOSITY
    writeErrorMessage "Setup install failed"

    labelText "Initializing DB"
    $CONSOLE setup:init-db $VERBOSITY
    writeErrorMessage "DB setup failed"

    generateTwigCacheFiles
}

function dropDevelopmentDatabase {
    if [[ $DATABASE_ENGINE == "mysql" ]] || [[ ${DATABASE_DEFAULT_ENGINE} == "mysql" ]]; then
        labelText "Drop MySQL database: ${DATABASE_NAME}"
        mysql -u${DATABASE_USER} -p${DATABASE_PASSWORD} -e "DROP DATABASE IF EXISTS ${DATABASE_NAME};"
    else
        if [ `sudo -u postgres psql -l | grep ${DATABASE_NAME} | wc -l` -ne 0 ]; then
            PG_CTL_CLUSTER=`which pg_ctlcluster`
            DROP_DB=`which dropdb`

            if [[ -f $PG_CTL_CLUSTER ]] && [[ -f $DROP_DB ]]; then
                labelText "Deleting PostgreSql Database: ${DATABASE_NAME} "
                labelText "Drop PostgresSQL database: ${DATABASE_NAME}"
                sudo pg_ctlcluster $PG_VERSION main restart --force && sudo -u postgres dropdb $DATABASE_NAME 1>/dev/null
                writeErrorMessage "Deleting DB command failed"
            fi

            MIGRATION_DIRECTORY=./src/Orm/Propel/DE/Migration_pgsql
            if [ -d $MIGRATION_DIRECTORY ] && [ $(ls -A $MIGRATION_DIRECTORY) ]; then
                labelText "Removing propel migration files for core development"
                rm "$MIGRATION_DIRECTORY"/*
                writeErrorMessage "Removing propel migration files command failed"
            else
                labelText "Migration directory does not exist or is empty"
            fi
        fi
    fi

}

function updateComposerBinary {
    labelText "Setting up composer"

    if [[ ! -f "./composer.phar" ]]; then
        labelText "Download composer.phar"
        $CURL -sS https://getcomposer.org/installer | $PHP
    fi

    COMPOSER_TIMESTAMP=$(stat -c %Y "composer.phar")
    CURRENT_TIMESTAMP=$(date +"%s")

    COMPOSER_FILE_AGE=$(($CURRENT_TIMESTAMP-$COMPOSER_TIMESTAMP))
    THIRTY_DAYS_AGE=$((60*60*24*30))

    if [[ $COMPOSER_FILE_AGE > $THIRTY_DAYS_AGE ]]; then
        labelText "Install Composer Dependencies"
        $PHP composer.phar selfupdate
    fi
}

function composerInstall {
    echo $@
    labelText "Installing composer packages"
    $PHP composer.phar install --prefer-dist
}

function dumpAutoload {
    $PHP composer.phar dump-autoload
}

function resetYves {
    removeLogFiles
    removeCacheFiles

    cleanupProjectFrontendDeps
    cleanupYvesFrontendPublicAssets
}

function displayHeader {
    labelText "Spryker Platform Setup"
    echo "./$(basename $0) [OPTION] [VERBOSITY]"
}

function displayHelp {

    displayHeader

    echo ""
    echo "  -i, --install-demo-shop"
    echo "      Install and setup new instance of Spryker Platform and populate it with Demo data"
    echo " "
    echo "  -yves, --install-yves"
    echo "      (re)Install Yves only"
    echo " "
    echo "  -zed, --install-zed"
    echo "      (re)Install Zed only"
    echo " "
    echo "  -r, --reset"
    echo "      Reset state. Delete Redis, Elasticsearch and Database data"
    echo ""
    echo "  -ddb, --dump-db"
    echo "      Dump database into a file"
    echo ""
    echo "  -rdb, --restore-db"
    echo "      Restore database from a file"
    echo ""
    echo "  -h, --help"
    echo "      Show this help"
    echo ""
    echo "  -c, --clean"
    echo "      Cleanup unnecessary files and optimize the local repository"
    echo ""
    echo "  -v, -vv, -vvv"
    echo "      Set verbosity level"
    echo " "
}
