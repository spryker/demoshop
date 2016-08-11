#!/bin/bash
echo "---------------------------"
echo "running vendor/bin/console propel:install -o"
echo "---------------------------"
vendor/bin/console propel:install -o
echo "---------------------------"
echo "running vendor/bin/console transfer:generate"
echo "---------------------------"
vendor/bin/console transfer:generate
echo "---------------------------"
echo "running vendor/bin/console setup:init-db"
echo "---------------------------"
vendor/bin/console setup:init-db
echo "---------------------------"
echo "running vendor/bin/console setup:search"
echo "---------------------------"
vendor/bin/console setup:search
echo "---------------------------"
echo "running vendor/bin/console import:demo-data"
echo "---------------------------"
vendor/bin/console import:demo-data
echo "---------------------------"
echo "running vendor/bin/console application:build-navigation-cache"
echo "---------------------------"
vendor/bin/console application:build-navigation-cache
echo "---------------------------"
echo "running chmod -R 777 data/"
echo "---------------------------"
chmod -R 777 data/
echo "---------------------------"
echo "running if [[ $TEST_GROUP == 'without-acceptance' ]]; then vendor/bin/codecept run -x Acceptance ; fi"
echo "---------------------------"
if [[ $TEST_GROUP == 'without-acceptance' ]]; then vendor/bin/codecept run -x Acceptance ; fi
echo "---------------------------"
echo "running if [[ $TEST_GROUP == 'acceptance' ]]; then vendor/bin/codecept run -g Acceptance ; fi"
echo "---------------------------"
if [[ $TEST_GROUP == 'acceptance' ]]; then vendor/bin/codecept run -g Acceptance ; fi
echo "---------------------------"
echo "running vendor/bin/console collector:storage:export"
echo "---------------------------"
vendor/bin/console collector:storage:export
echo "---------------------------"
echo "running vendor/bin/console collector:search:export"
echo "---------------------------"
vendor/bin/console collector:search:export
echo "---------------------------"
echo "running vendor/bin/console code:sniff"
echo "---------------------------"
vendor/bin/console code:sniff
