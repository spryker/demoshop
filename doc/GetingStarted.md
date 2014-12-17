# Getting Started

To quickly get you machines up and runnig, simply follow this documentation.

## Prequisites

* Vagrant
* Virtualbox
* Git

## Heat up the machine

Just execeute the following on your console:

```bash
git clone git@github.com:spryker/demoshop.git
vagrant up
```

## Start the engine

Login into the new created VM by executing:

```bash
vagrant ssh
```

If there was a message like the following which says that there are some failures

```
Summary
--------------
Succeeded: 244 (changed=30)
Failed:      12
--------------
Total states run:     244
```

Please execute the following after loging in into the VM:

```
sudo -i
salt-call state-highstate
exit
```

Then simply install all needed dependencies:

```
cd /data/shop/development/current
php composer.phar install
sudo npm install -d
./vendor/bin/console setup:install
```
Afterwards you should be able to access:

[ZED](http://zed-development.project-yz.de/)
[Yves](http://www-development.project-yz.de/)
