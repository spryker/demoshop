VAGRANTFILE_API_VERSION = "2"
SALT_DIRECTORY="./vendor/spryker/saltstack"
SALT_REPOSITORY="git@github.com:spryker/saltstack.git"
SALT_BRANCH="master"
PILLAR_DIRECTORY="./vendor/spryker/pillar"
PILLAR_REPOSITORY="git@github.com:spryker/pillar.git"
PILLAR_BRANCH="master"
HOSTS=["spryker.dev", "zed.de.spryker.dev","zed.com.spryker.dev", "www.com.spryker.dev", "com.spryker.dev", "static.com.spryker.dev", "www.de.spryker.dev", "de.spryker.dev", "static.de.spryker.dev", "kibana.spryker.dev"]

# Verify if salt/pillar directories are present
require 'mkmf'

if !Dir.exists?(SALT_DIRECTORY)
  if find_executable 'git'
    system "git clone #{SALT_REPOSITORY} --branch #{SALT_BRANCH} #{SALT_DIRECTORY}"
  else
    raise "ERROR: Required #{SALT_DIRECTORY} could not be found and no git executable was found to solve this problem." +
    "\n\n\033[0m"
  end
end

if !Dir.exists?(PILLAR_DIRECTORY)
  if find_executable 'git'
    system "git clone #{PILLAR_REPOSITORY} --branch #{PILLAR_BRANCH} #{PILLAR_DIRECTORY}"
  else
    raise "ERROR: Required #{PILLAR_DIRECTORY} could not be found and no git executable was found to solve this problem." +
    "\n\n\033[0m"
  end
end

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  # Base box for initial setup. Latest Debian (stable) is recommended.
  # The list of available community boxes is available on: http://www.vagrantbox.es/
  # Not that the box file should have virtualbox guest additions installed, otherwise shared folders will not work
  config.vm.box = "debian76"
  config.vm.box_url = "https://github.com/jose-lpa/packer-debian_7.6.0/releases/download/1.0/packer_virtualbox-iso_virtualbox.box"
  config.vm.hostname = "spryker-vagrant"
  config.vm.boot_timeout = 300

  # Enable ssh agent forwarding
  config.ssh.forward_agent = true

  # The VirtualBox IP-address for the browser
  config.vm.network :private_network, ip: "10.10.0.33"

  # Port forwarding for services running on VM:
  config.vm.network "forwarded_port", guest: 1080, host: 1080, auto_correct: true   # Mailcatcher
  config.vm.network "forwarded_port", guest: 3306, host: 3306, auto_correct: true   # MySQL
  config.vm.network "forwarded_port", guest: 5432, host: 5432, auto_correct: true   # PostgreSQL
  config.vm.network "forwarded_port", guest: 9200, host: 9200, auto_correct: true   # ELK-Elasticsearch
  config.vm.network "forwarded_port", guest: 9292, host: 9292, auto_correct: true   # ELK-Kibana

  # SaltStack masterless setup
  if Dir.exists?(PILLAR_DIRECTORY) && Dir.exists?(SALT_DIRECTORY)
    config.vm.synced_folder SALT_DIRECTORY,   "/srv/salt/"
    config.vm.synced_folder PILLAR_DIRECTORY, "/srv/pillar/"
    config.vm.provision "shell", path: "salt/scripts/bootstrap_saltstack.sh"
    config.vm.provision :salt do |salt|
      salt.minion_config = "salt/minion"
      salt.run_highstate = true
    end
  else
    raise "ERROR: Salt (#{SALT_DIRECTORY}) or Pillar (#{PILLAR_DIRECTORY}) directory not found.\n\n\033[0m"
  end

  # add hosts to /etc/hosts
  if Vagrant.has_plugin? 'vagrant-hostmanager'
    config.hostmanager.enabled = true
    config.hostmanager.manage_host = true
    config.hostmanager.ignore_private_ip = false
    config.hostmanager.include_offline = true
    config.hostmanager.aliases = HOSTS
  else
    puts "WARNING: Please add the following entries to your /etc/hosts \n\n\033[0m"
    puts "10.10.0.33 #{HOSTS.join(' ')}\n"
  end

  # Share the application code with VM
  config.vm.synced_folder "./", "/data/shop/development/current", type: "nfs"
  config.nfs.map_uid = Process.uid
  config.nfs.map_gid = Process.gid

  # Configure VirtualBox VM resources (CPU and memory)
  config.vm.provider :virtualbox do |vb|
    vb.name = "Spryker Vagrant"
    vb.customize([
      "modifyvm", :id,
      "--memory", 4096,
      "--cpus", 4
    ])
  end
end
