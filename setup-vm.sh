#!/bin/bash

echo 'Installing Composer Dependencies'

[ ! -f composer.phar ] && curl -sS https://getcomposer.org/installer | php
php composer.phar selfupdate
php composer.phar install

echo 'Running build-class-map'

vendor/bin/build-class-map

echo 'Running setup:install'

vendor/bin/console setup:install -vvv

echo 'Running setup:install-demo-data'

vendor/bin/console setup:install-demo-data -vvv

echo 'Running collector:search:export'

vendor/bin/console collector:search:export -vvv

echo 'Running collector:storage:export'

vendor/bin/console collector:storage:export -vvv
