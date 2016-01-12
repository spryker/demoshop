spryker
=======

For detailed installation instructions see
* [Installation - https://academy.spryker.com/display/AC/Installation](https://academy.spryker.com/display/AC/Installation)
* [Dev Environment Setup - https://academy.spryker.com/display/SPRYK/Dev+Environment+Setup](https://academy.spryker.com/display/SPRYK/Dev+Environment+Setup)



sudo mkdir -p /opt/src/erlang /opt/erlang
cd /opt/src/erlang
sudo curl -O http://www.erlang.org/download/otp_src_R16B.tar.gz
sudo tar xzvf otp_src_R16B.tar.gz
sudo mv otp_src_R16B r16b
cd r16b
sudo ./configure --prefix=/opt/erlang/r16b --enable-hipe --with-ssl
sudo make
sudo make install

sudo ln -s /opt/erlang/r16b/bin/dialyzer /usr/bin
sudo ln -s /opt/erlang/r16b/bin/epmd /usr/bin
sudo ln -s /opt/erlang/r16b/bin/erl /usr/bin
sudo ln -s /opt/erlang/r16b/bin/erlc /usr/bin
sudo ln -s /opt/erlang/r16b/bin/run_erl /usr/bin
sudo ln -s /opt/erlang/r16b/bin/run_test /usr/bin
sudo ln -s /opt/erlang/r16b/bin/typer /usr/bin
