spryker
=======

## Installation

```
cd /data/shop/development/current
php composer.phar install
sudo npm install -d
./vendor/bin/console setup:install
```

## Development

### Setup a development VM

__Requirements:__

* [Virtualbox](https://www.virtualbox.org/wiki/Downloads)
* [Vagrant](https://www.vagrantup.com/downloads.html)
* [Vagrant-Hostmanager Plugin](https://github.com/smdahlen/vagrant-hostmanager)

If all requirements are satisfied you can bring up a new development VM by just calling:

```vagrant up```

After about 20 minutes you can access the VM via:

```vagrant ssh``