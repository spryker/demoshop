#!/bin/bash

set -o pipefail

SETUP='spryker'

. ./setup-functions.sh

if [[ `echo "$@" | grep '\-\-reset'` ]] || [[ `echo "$@" | grep '\-r'` ]]; then
    resetDevelopmentState
    installAntelope

    exit 0
fi

if [[ `echo "$@" | grep '\-\-install'` ]] || [[ `echo "$@" | grep '\-i'` ]]; then
    installDemoshop

    exit 0
fi

displayHelp

exit 0
