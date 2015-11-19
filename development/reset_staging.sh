#!/bin/bash


sudo /etc/init.d/postgresql restart
sudo dropdb DE_staging_zed
set -e
curl -XDELETE 'http://localhost:13005/_all'
redis-cli -p 13009 flushdb
sudo /etc/init.d/elasticsearch-staging restart
sleep 5
rm -rf /data/shop/staging/current/src/Generated/Propel/DE/Migration/
/data/shop/staging/current/vendor/bin/pav-console cache:delete-all 
/data/shop/staging/current/vendor/bin/pav-console setup:remove-generated-directory 
/data/shop/staging/current/vendor/bin/pav-console transfer:generate 
/data/shop/staging/current/vendor/bin/build-multiple-core-class-map
/data/shop/staging/current/vendor/bin/pav-console propel:install
/data/shop/staging/current/vendor/bin/pav-console setup:init-db 
/data/shop/staging/current/vendor/bin/pav-console setup:generate-zed-ide-auto-completion 
/data/shop/staging/current/vendor/bin/pav-console setup:search 
/data/shop/staging/current/vendor/bin/pav-console setup:install-demo-data 
/data/shop/staging/current/vendor/bin/pav-console collector:search:export
/data/shop/staging/current/vendor/bin/pav-console collector:storage:export



