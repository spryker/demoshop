#!/bin/bash

set -o pipefail

SETUP='spryker'
. deploy/setup/functions.sh

./deploy/heroku/setup-$APPLICATION_NAME.sh -i
