spryker
=======

## Development

### Setup a development VM

__Requirements:__

* [Virtualbox](https://www.virtualbox.org/wiki/Downloads)
* [Vagrant](https://www.vagrantup.com/downloads.html)
* [Vagrant-Hostmanager Plugin](https://github.com/smdahlen/vagrant-hostmanager)

It is recommended to use [VirtualBox 4.3.30](http://download.virtualbox.org/virtualbox/4.3.30/) and [Vagrant 1.7.2](https://www.vagrantup.com/download-archive/v1.7.2.html)

If all requirements are satisfied you can bring up a new development VM by just calling:

```bash
vagrant up
```
__Troubleshooting:__
* Should you run into an error when executing "mount -o 'vers=3,udp' 10.10.0.1:'/Users/.../vendor/spryker/saltstack' /srv/salt", try switching Sections "SaltStack masterless setup" and "add hosts to /etc/hosts" in your Vagrantfile.

After about 20 minutes you can access the VM via:

```bash
vagrant ssh
```

Inside the VM you have to install the application and prepare everything for your development:

```bash
cd /data/shop/development/current
php composer.phar install
npm install -d
vendor/bin/console setup:install
```

This demoshop comes with some default data to play around with which are installable via:

```bash
vendor/bin/console setup:install-demo-data
```
Afterwards you should call the following two commands to export all demo products and needed translations to the frontend:

```bash
vendor/bin/console frontend-exporter:export-search
```

```bash
vendor/bin/console frontend-exporter:export-key-value
```

If you need to login into Zed, use the following credentials:

**Username:** admin@spryker.com
**Password:** change123

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
salt-call --local state.highstate
```

Afterwards your VM has the newest configuration and dependencies


### Mac OSX Users with iterm2 (locale error)
If you encounter error messages like: 

```
perl: warning: Setting locale failed.
perl: warning: Please check that your locale settings:
    LANGUAGE = (unset),
    LC_ALL = (unset),
    LC_CTYPE = "de_DE.UTF-8",
    LANG = "C"
   are supported and installed on your system.
perl: warning: Falling back to the standard locale ("C").
perl: warning: Setting locale failed.
perl: warning: Please check that your locale settings:
    LANGUAGE = (unset),
    LC_ALL = (unset),
    LC_CTYPE = "de_DE.UTF-8",
    LANG = "C"
   are supported and installed on your system.
perl: warning: Falling back to the standard locale ("C").
```

Go to iterm2's `Preferences -> Profiles -> Terminal` and disable `Set locale variables automatically`.
