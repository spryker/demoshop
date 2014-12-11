#!/bin/bash

for file in /etc/init.d/memcached-*; do
  $file restart
done
