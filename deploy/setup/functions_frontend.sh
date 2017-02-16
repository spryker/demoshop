#!/bin/bash

FIND=`which find`
FE_PM=`which $FE_PACKAGE_MANAGER`
ANTELOPE_TOOL=`which antelope`

ANTELOPE_INSTALLED=false
SUCCESS=0
FAILURE=1

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

    installProjectFrontendDeps
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

    installProjectFrontendDeps
    installCoreFrontendDeps
    buildZedFrontend
}

# default

function installProjectFrontendDeps {
    labelText "Frontend: installing project dependencies"

    $FE_PM $FE_INSTALL_COMMAND

    writeErrorMessage "Installation failed"
}

function installCoreFrontendDeps {
    labelText "Frontend: installing bundle dependencies"
    bundlePkgJsonPaths=($($FIND vendor/ -regex "$FE_ZED_BUNDLE_PKGJSON_PATTERN"))

    for bundlePkgJsonPath in ${bundlePkgJsonPaths[*]}
    do
        bundlePkgJsonParentPath=`dirname $bundlePkgJsonPath`

        echo "-> $bundlePkgJsonParentPath"
        (cd $bundlePkgJsonParentPath && $FE_PM install)

        writeErrorMessage "Installation failed"
    done
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

# antelope (legacy)

function installAntelope {
    if $ANTELOPE_INSTALLED ; then
        return
    fi

    labelText "Installing/updating Antelope tool globally"

    ANTELOPE_INSTALLED=true
    sudo $FE_PM $FE_INSTALL_COMMAND -g antelope

    writeErrorMessage "Antelope installation failed"
}

function checkAntelope {
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
