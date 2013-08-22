#!/bin/bash

solr="core/Solr/solr.war"
jenkins="project/Jenkins/jenkins.war"

webapps="/data/shop/development/shared/tomcat/webapps"

for file in $solr $jenkins; do
  if [ -f $file ]; then
    echo "Copying $file"
    cp -f $file ../../$webapps/
  else
    echo "$file - file not found, ignoring"
  fi
done

sudo /etc/init.d/tomcat6-development restart
