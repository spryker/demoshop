#!/bin/bash
echo "------[ RUNNING START SCRIPT ]-----"
# switching PHP version
phpenv global 7.0
eval "$(phpenv init -)"
php -v
# linking mysql service
socat TCP4-LISTEN:3306,fork,reuseaddr TCP4:mysql:3306 &
sudo mkdir /var/run/mysqld
sudo chown travis /var/run/mysqld
socat UNIX-LISTEN:/var/run/mysqld/mysqld.sock,fork,reuseaddr TCP4:mysql:3306 &
mysql -uroot -e "GRANT ALL PRIVILEGES ON *.* TO travis@$(hostname --ip-address) IDENTIFIED BY ''"
# linking postgresql service
socat TCP4-LISTEN:5432,fork,reuseaddr TCP4:postgresql:5432 &
sudo mkdir /var/run/postgresql
sudo chown travis /var/run/postgresql
socat UNIX-LISTEN:/var/run/postgresql/.s.PGSQL.5432,fork,reuseaddr TCP4:postgresql:3306 &
psql -c "CREATE USER postgres WITH PASSWORD ''  ;"

# linking postgresql service
socat TCP4-LISTEN:5432,fork,reuseaddr TCP4:postgresql:5432 &
sudo mkdir /var/run/postgresql
sudo chown travis /var/run/postgresql
socat UNIX-LISTEN:/var/run/postgresql/.s.PGSQL.5432,fork,reuseaddr TCP4:postgresql:3306 &
psql -c "CREATE USER postgres WITH PASSWORD ''  ;"

# linking redis service
socat TCP4-LISTEN:6379,fork,reuseaddr TCP4:redis:6379 &
# before_script section .travis.yml
mkdir -p shared/data/common/jenkins
mkdir -p shared/data/common/jenkins/jobs
mv config/Zed/propel.ci.yml config/Zed/propel.yml
cp config/Shared/config_default-development.ci.php config/Shared/config_default-development_DE.php
cp config/Shared/config_default-development.ci.php config/Shared/config_default-test.php
mkdir -p data/DE/cache/Yves/twig -m 0777
mkdir -p data/DE/cache/Zed/twig -m 0777
mkdir -p data/DE/logs -m 0777
