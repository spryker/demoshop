#!/bin/bash

# [!] include deploy/setup/util/print.sh before this file
# [!] include deploy/setup/frontend/params.sh before this file
# [!] include deploy/setup/frontend/params_test_env.sh before this file
# [!] include deploy/setup/frontend/functions.sh before this file
# create/override some function to allow deploy on travis

function setupFrontendForTest {
    checkFrontendPackageManager
    installProjectFrontendDeps
    installYvesCoreFrontendDeps
    buildYvesFrontend
    installZedCoreFrontendDeps
    buildZedFrontend
}
