#!/bin/bash

# [!] include deploy/setup/util/print.sh before this file
# [!] include deploy/setup/frontend/params.sh before this file
# [!] include deploy/setup/frontend/params_heroku.sh before this file
# [!] include deploy/setup/frontend/functions.sh before this file
# override some function to allow deploy on heroku

function setupYvesFrontend {
    checkFrontendPackageManager
    installProjectFrontendDeps
    installYvesCoreFrontendDeps
    buildYvesFrontend
}

function setupZedFrontend {
    checkFrontendPackageManager
    installProjectFrontendDeps
    installZedCoreFrontendDeps
    buildZedFrontend
}
