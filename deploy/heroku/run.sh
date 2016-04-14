#!/bin/bash

set -o pipefail

./deploy/heroku/setup-$APPLICATION_NAME.sh -i
