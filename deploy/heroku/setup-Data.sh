#!/bin/bash

set -o pipefail

SETUP='spryker'
. deploy/setup/functions.sh

updateComposerBinary

dumpAutoload

exit 0 # it will timeout anyways, have to login via shell and run it manually via setup-Data-manually.sh -i