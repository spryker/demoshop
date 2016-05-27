#!/bin/bash

set -o pipefail

SETUP='spryker'
DATABASE_NAME='DE_development_zed'
DATABASE_PASSWORD='mate20mg'
VERBOSITY='-v'

. ./setup-functions.sh

if [ $# -eq 0 ]; then
    displayHelp
    exit 0
fi

for arg in "$@"
do
    case $arg in
        "--install-demo-shop" | "-i" )
           installDemoshop
           ;;
        "--install-yves" | "-iy" )
           installYves
           ;;
        "--install-zed" | "-iz" )
           installZed
           ;;
        "--reset" | "-r" )
           resetDevelopmentState
           ;;
        "--dump-db" | "-ddb" )
           dumpDevelopmentDatabase
           ;;
        "--restore-db" | "-rdb" )
           restoreDevelopmentDatabase
           ;;
        "--help" | "-h" )
           displayHelp
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
