#!/bin/bash

set -o pipefail

if [ $# -eq 0 ]; then
    echo "Use <Yves> or <Zed> as parameter"
    exit 0
fi

./setup/heroku/setup-$APPLICATION_NAME.sh
