#!/bin/bash

set -o pipefail

SETUP='spryker'

. deploy/setup/util/print.sh
. deploy/setup/functions.sh

time ./deploy/heroku/setup-$APPLICATION_NAME.sh -i
