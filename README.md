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
cd /data/shop/development/current/vendor/spryker/zed-package
npm install -d
gulp
cd /data/shop/development/current
APPLICATION_ENV=development APPLICATION_STORE=DE console setup:install
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


### Configure the VM to your needs

If you want to commit from within the VM just set the right git preferences:

```
git config --global user.email <your.email@domain.tld> 
git config --global user.name <Your Name>
```

### Update the VM configuration

When the VM configuration should be updated via saltstack there is no need to destroy your VM and create a new one, just execute the following commands:

In the project directory (outside of VM):
```
cd vendor/spryker/saltstack
git pull
cd ../pillar
git pull
cd ../../..
vagrant ssh
```

Inside the VM:
```
sudo su
salt-call --local state-highstate
```

Afterwards your VM has the newest configuration and dependencies