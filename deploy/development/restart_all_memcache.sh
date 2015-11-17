#!/bin/bash

#Exit if a command exits with a non-zero status
set -e

#Exit if an uninitialised variable is used
set -o nounset

for file in /etc/init.d/memcached-*; do
  $file restart
done
