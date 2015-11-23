#!/usr/bin/env bash
apt-get update
apt-get -y install git

git clone git@saltstack-core.github.com:pets-deli/saltstack-core.git /srv/salt
git clone git@pillar-dev.github.com:pets-deli/pillar-dev.git /srv/pillar

echo "deb http://debian.saltstack.com/debian wheezy-saltstack main" >> /etc/apt/sources.list.d/saltstack.list
wget -q -O- "http://debian.saltstack.com/debian-salt-team-joehealy.gpg.key" | sudo apt-key add -
apt-get update
apt-get -y install salt-common salt-minion pkg-config python2.7-dev


cp /srv/salt_staging/minion /etc/salt/minion
/etc/init.d/salt-minion restart
salt-call --local state.highstate