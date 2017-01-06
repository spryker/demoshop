#!/bin/bash

mkdir /home/travis/elasticsearch
wget -O - https://download.elasticsearch.org/elasticsearch/release/org/elasticsearch/distribution/tar/elasticsearch/2.3.3/elasticsearch-2.3.3.tar.gz | tar xz --directory=/home/travis/elasticsearch --strip-components=1
/home/travis/elasticsearch/bin/elasticsearch --daemonize --path.data /home/travis/elasticsearch
