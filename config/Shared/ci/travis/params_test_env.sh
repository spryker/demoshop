#!/bin/bash

SETUP='spryker'
DATABASE_NAME='DE_test_zed'
DATABASE_USER='postgres'
DATABASE_PASSWORD=''
REDIS_PORT='6379'
ELASTIC_SEARCH_PORT='9200'
ELASTIC_SEARCH_INDEX='de_search'
VERBOSITY='-v'
CONSOLE=vendor/bin/console
PHANTOMJS_CDNURL='https://github.com/Medium/phantomjs/'
DATABASE_BACKUP_PATH='data/test.backup'

. deploy/setup/frontend/params_test_env.sh
