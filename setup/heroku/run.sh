#!/bin/bash

set -o pipefail

./setup/heroku/setup-$APPLICATION_NAME.sh -i
