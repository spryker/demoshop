#!/bin/bash

solr="vendor/project-a/infrastructure-package/bin/solr.war"
jenkins="vendor/project-a/infrastructure-package/bin/jenkins.war"

webapps="/data/shop/development/shared/tomcat/webapps"

for file in $solr $jenkins; do
  if [ -f ../../$file ]; then
    echo "Copying $file"
    cp -f ../../$file $webapps/
  else
    echo "../../$file - file not found, ignoring"
  fi
done

sudo /etc/init.d/tomcat*-development restart
