socat TCP4-LISTEN:10005,fork,reuseaddr TCP4:elasticsearch:10005 &
sudo mkdir /var/run/elasticsearch
sudo chown travis /var/run/elasticsearch

# socat UNIX-LISTEN:/var/run/postgresql/.s.PGSQL.5432,fork,reuseaddr TCP4:postgresql:3306 &
# psql -c "CREATE USER postgres WITH PASSWORD ''  ;"
