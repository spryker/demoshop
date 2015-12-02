#!/bin/bash

sudo /etc/init.d/postgresql restart
sudo dropdb DE_development_zed
sudo createdb -E UTF8 -T template0 DE_development_zed
set -e
curl -XDELETE 'http://localhost:10005/_all'
redis-cli -p 10009 flushdb
sudo /etc/init.d/elasticsearch-development restart
sleep 5
rm -rf /data/shop/development/current/src/Generated/Propel/DE/Migration/
/data/shop/development/current/vendor/bin/pav-console cache:delete-all 
/data/shop/development/current/vendor/bin/pav-console setup:remove-generated-directory 
/data/shop/development/current/vendor/bin/pav-console transfer:generate
/data/shop/development/current/vendor/bin/build-multiple-core-class-map
/data/shop/development/current/vendor/bin/pav-console propel:install
/data/shop/development/current/vendor/bin/pav-console setup:init-db 
/data/shop/development/current/vendor/bin/pav-console setup:generate-zed-ide-auto-completion
/data/shop/development/current/vendor/bin/pav-console setup:search 
/data/shop/development/current/vendor/bin/pav-console setup:install-demo-data  -vvv
/data/shop/development/current/vendor/bin/pav-console collector:search:export
/data/shop/development/current/vendor/bin/pav-console collector:storage:export



