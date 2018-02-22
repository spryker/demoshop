#!/usr/bin/env bash

cd vendor/spryker/spryker
if [ -z "$(git add -n -A)" ]; then
    echo "no untracked files in spryker/spryker, all good" ;
else
    git add -n -A && exit 1 ;
fi
cd -

if [ -z "$(git add src tests -n -A)" ]; then
    echo "no untracked files in src/tests, all good" ;
else
    git add src tests -n -A && exit 1 ;
fi

exit 0;
