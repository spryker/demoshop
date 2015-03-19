spryker
=======

## Development

### Setup a development VM

__Requirements:__

* [Virtualbox](https://www.virtualbox.org/wiki/Downloads)
* [Vagrant](https://www.vagrantup.com/downloads.html)
* [Vagrant-Hostmanager Plugin](https://github.com/smdahlen/vagrant-hostmanager)

If all requirements are satisfied you can bring up a new development VM by just calling:

```bash
vagrant up
```

After about 20 minutes you can access the VM via:

```bash
vagrant ssh
```

Inside the VM you have to install the application and prepare everything for your development:

```bash
cd /data/shop/development/current
php composer.phar install
npm install -d
APPLICATION_ENV=development APPLICATION_STORE=DE console setup:install
cd /data/shop/development/current/vendor/spryker/zed-package
npm install -d
gulp
cd /data/shop/development/current
APPLICATION_ENV=development APPLICATION_STORE=DE console code:gulp
```

This demoshop comes with some default data to play around with which are installable via:

```bash
APPLICATION_ENV=development APPLICATION_STORE=DE console setup:install-demo-data
```
Afterwards you should call the following two URL's to export all demo products and needed translations to the frontend:

[Search Exporter](http://zed.de.spryker.dev/frontend-exporter/cronjob/export-search?verbose=true)  
[Key Value Exporter](http://zed.de.spryker.dev/frontend-exporter/cronjob/export-key-value?verbose=true)

If you need to login into Zed, use the following credentials:

**Username:** admin  
**Password:** Avv3$0M3PA55vv0RD
