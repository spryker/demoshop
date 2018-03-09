#!/bin/bash

mkdir /home/travis/elasticsearch
wget -O - https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-5.6.7.tar.gz | tar xz --directory=/home/travis/elasticsearch --strip-components=1
/home/travis/elasticsearch/bin/elasticsearch --daemonize
