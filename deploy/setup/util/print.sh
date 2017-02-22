#!/bin/bash

# [!] include this util before every other file
# provide terminal print functions

ERROR_BKG=`tput setab 1` # background red
GREEN_BKG=`tput setab 2` # background green
BLUE_BKG=`tput setab 4` # background blue
YELLOW_BKG=`tput setab 3` # background yellow
MAGENTA_BKG=`tput setab 5` # background magenta

INFO_TEXT=`tput setaf 3` # yellow text
WHITE_TEXT=`tput setaf 7` # text white
BLACK_TEXT=`tput setaf 0` # text black
RED_TEXT=`tput setaf 1` # text red
NC=`tput sgr0` # reset

function labelText {
    echo -e "\n${BLUE_BKG}${WHITE_TEXT}-> ${1} ${NC}\n"
}

function errorText {
    echo -e "\n${ERROR_BKG}${WHITE_TEXT}=> ${1} <=${NC}\n"
}

function infoText {
    echo -e "\n${INFO_TEXT}=> ${1} <=${NC}\n"
}

function successText {
    echo -e "\n${GREEN_BKG}${BLACK_TEXT}=> ${1} <=${NC}\n"
}

function warningText {
    echo -e "\n${YELLOW_BKG}${BLACK_TEXT}=> ${1} <=${NC}\n"
}

function setupText {
    echo -e "\n${MAGENTA_BKG}${WHITE_TEXT}=> ${1} <=${NC}\n"
}

function writeErrorMessage {
    if [[ $? != 0 ]]; then
        errorText "${1}"
        errorText "Command unsuccessful"
        exit 1
    fi
}
