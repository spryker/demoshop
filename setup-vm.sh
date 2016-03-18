#!/bin/bash

SETUP='spryker'

. ./setup-functions.sh

if [[ `echo "$@" | grep '\-\-reset'` ]] || [[ `echo "$@" | grep '\-r'` ]]; then
    resetDevelopmentState

    exit 0
fi

if [[ `echo "$@" | grep '\-\-install'` ]] || [[ `echo "$@" | grep '\-i'` ]]; then
    installDemoshop

    exit 0
fi

if [[ `echo "$@" | grep '\-\-help'` ]] || [[ `echo "$@" | grep '\-h'` ]]; then
    displayHelp

    exit 0
fi

displayHelp

exit 0
