#!/usr/bin/env bash
sudo echo "deb http://debian.saltstack.com/debian wheezy-saltstack main" >> /etc/apt/sources.list.d/saltstack.list
wget -q -O- "http://debian.saltstack.com/debian-salt-team-joehealy.gpg.key" | sudo apt-key add -
sudo apt-get update
sudo apt-get -y install salt-common salt-minion