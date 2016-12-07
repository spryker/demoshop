#!/bin/bash

NPM=`which npm`

function installAntelope {
    if [[ `node -v | grep -E '^v[0-4]'` ]]; then
        labelText "Upgrade Node.js"
        $NPM cache clean -f

        $NPM install -g n
        writeErrorMessage "NPM build failed"

        n stable

        successText "Node.js updated to version `node -v`"
        successText "NPM updated to version `$NPM -v`"
    fi

    labelText "Install Antelope tool globally"
    $NPM install -g antelope
    writeErrorMessage "Antelope setup failed"
}
