#!/bin/bash

# [!] include deploy/setup/util/print.sh before this file
# [!] include deploy/setup/frontend/params.sh before this file
# provide deploy functions for frontend

FIND=`which find`
FE_PM=`which $FE_PACKAGE_MANAGER`
ANTELOPE_TOOL=`which antelope`

# status flags
STATUS_ANTELOPE_INSTALLED=false
STATUS_CLEANED_UP=false
STATUS_PROJECT_DEPS_INSTALLED=false

# main functions

function setupYvesFrontend {
    assureNodeJsVersion
    checkFrontendPackageManager

    if $FE_ANTELOPE_LEGACY ; then
        installAntelope
        checkAntelope
        installFrontendDepsWithAntelope
        buildYvesFrontendWithAntelope
        return
    fi

    cleanupProjectFrontend
    installProjectFrontendDeps
    installYvesCoreFrontendDeps
    buildYvesFrontend
}

function setupZedFrontend {
    assureNodeJsVersion
    checkFrontendPackageManager

    if $FE_ANTELOPE_LEGACY ; then
        installAntelope
        checkAntelope
        installFrontendDepsWithAntelope
        buildZedFrontendWithAntelope
        return
    fi

    cleanupProjectFrontend
    installProjectFrontendDeps
    installZedCoreFrontendDeps
    buildZedFrontend
}

# checks

function assureNodeJsVersion {
    if [[ `node -v | grep -E '^v[0-5]'` ]]; then
        labelText "Upgrade Node.js"
        $CURL -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
        sudo -i apt-get install -y nodejs

        successText "Node.js updated to version `node -v`"
        successText "NPM updated to version `$NPM -v`"
    fi
}

function checkFrontendPackageManager {
    if [[ ! -f $FE_PM ]]; then
        errorText "${FE_PACKAGE_MANAGER} is not available/properly installed"
        exit 1
    fi
}

# default build

function cleanupProjectFrontend {
    if $STATUS_CLEANED_UP ; then
        return
    fi

    labelText "Frontend: cleaning up project"

    if [[ -d "./node_modules" ]]; then
        echo "removing ./node_modules folder..."
        rm -fR ./node_modules
        writeErrorMessage "Could not delete node_modules folder"
    fi

    if [[ -d "./public/Yves/assets" ]]; then
        echo "removing ./public/Yves/assets folder..."
        rm -fR ./public/Yves/assets
        writeErrorMessage "Could not delete Yves/assets folder"
    fi

    if [[ -d "./public/Zed/assets" ]]; then
        echo "removing ./public/Zed/assets folder..."
        rm -fR ./public/Zed/assets
        writeErrorMessage "Could not delete Zed/assets folder"
    fi

    STATUS_CLEANED_UP=true
    echo "done"
}

function installProjectFrontendDeps {
    if $STATUS_PROJECT_DEPS_INSTALLED ; then
        return
    fi

    labelText "Frontend: installing project dependencies"

    $FE_PM $FE_INSTALL_COMMAND

    writeErrorMessage "Installation failed"

    STATUS_PROJECT_DEPS_INSTALLED=true
}

function installYvesCoreFrontendDeps {
    labelText "Frontend: installing Yves bundle dependencies"
    bundlePkgJsonPaths=($($FIND vendor/ -regex "$FE_YVES_BUNDLE_PKGJSON_PATTERN"))

    for bundlePkgJsonPath in ${bundlePkgJsonPaths[*]}
    do
        bundlePkgJsonParentPath=`dirname $bundlePkgJsonPath`

        echo "installing $bundlePkgJsonParentPath..."
        (cd $bundlePkgJsonParentPath && $FE_PM $FE_INSTALL_COMMAND)

        writeErrorMessage "Installation failed"
    done

    echo "done"
}

function installZedCoreFrontendDeps {
    labelText "Frontend: installing Zed bundle dependencies"
    bundlePkgJsonPaths=($($FIND vendor/ -regex "$FE_ZED_BUNDLE_PKGJSON_PATTERN"))

    for bundlePkgJsonPath in ${bundlePkgJsonPaths[*]}
    do
        bundlePkgJsonParentPath=`dirname $bundlePkgJsonPath`

        echo "installing $bundlePkgJsonParentPath..."
        (cd $bundlePkgJsonParentPath && $FE_PM $FE_INSTALL_COMMAND)

        writeErrorMessage "Installation failed"
    done

    echo "done"
}

function buildYvesFrontend {
    labelText "Frontend: building assets for Yves"

    $FE_PM run $FE_YVES_SCRIPT

    writeErrorMessage "Build failed"
}

function buildZedFrontend {
    labelText "Frontend: building assets for Zed"

    $FE_PM run $FE_ZED_SCRIPT

    writeErrorMessage "Build failed"
}

# antelope build (legacy)

function installAntelope {
    if $STATUS_ANTELOPE_INSTALLED ; then
        return
    fi

    labelText "Installing/updating Antelope tool globally"

    if [ "$FE_PACKAGE_MANAGER" != "npm" ] ; then
        errorText "${FE_PACKAGE_MANAGER} package manager is not supported by Antelope: please switch to npm"
        exit 1
    fi

    sudo $FE_PM $FE_INSTALL_COMMAND -g antelope

    writeErrorMessage "Antelope installation failed"

    STATUS_ANTELOPE_INSTALLED=true
}

function checkAntelope {
    ANTELOPE_TOOL=`which antelope`

    if [[ ! -f $ANTELOPE_TOOL ]]; then
        errorText "Antelope is not available/properly installed"
        exit 1
    fi
}

function installFrontendDepsWithAntelope {
    labelText "Antelope: installing dependencies"

    $ANTELOPE_TOOL $FE_INSTALL_COMMAND

    writeErrorMessage "Installation failed"
}

function buildYvesFrontendWithAntelope {
    labelText "Antelope: building assets for Yves"

    $ANTELOPE_TOOL build yves

    writeErrorMessage "Build failed"
}

function buildZedFrontendWithAntelope {
    labelText "Antelope: building assets for Zed"

    $ANTELOPE_TOOL build zed

    writeErrorMessage "Build failed"
}
