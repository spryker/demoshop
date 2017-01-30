#!/bin/bash

SETUP='spryker'
DATABASE_NAME='DE_development_zed'
DATABASE_USER='development'
DATABASE_PASSWORD='mate20mg'
REDIS_PORT='10009'
ELASTIC_SEARCH_PORT='10005'
ELASTIC_SEARCH_INDEX='de_search'
VERBOSITY='-v'
CONSOLE=vendor/bin/console

# frontend (FE)
FE_ANTELOPE_LEGACY=false
FE_PACKAGE_MANAGER='npm'
FE_YVES_SCRIPT='yves'
FE_ZED_SCRIPT='zed'
FE_ZED_BUNDLE_PKGJSON_PATTERN=".+/assets/Zed/package.json$"
