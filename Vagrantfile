VAGRANTFILE_API_VERSION = "2"
SALT_DIRECTORY="./vendor/spryker/saltstack"
PILLAR_DIRECTORY="./spryker/pillar"

# Verify required vagrant plugins
#required_plugins=["vagrant-hostmanager"]
#missing_plugins = required_plugins.reject { |p| Vagrant.has_plugin? p }

#if not Vagrant.has_plugin?("vagrant-hostmanager")
#  raise "ERROR: Required vagrant plugin hostmanager is not installed.\n\n\033[0m" +
#    "\nTo install plugin, use command:\ngem install ffi; vagrant plugin install vagrant-hostmanager\n"
#end

# Verify if salt/pillar directories are present
if !Dir.exists?(SALT_DIRECTORY)
  raise "ERROR: Salt directory not found.\n\n\033[0m" +
    "You must clone saltstack repository to #{SALT_DIRECTORY} and/or provide correct path in Vagrantfile"
end
if !Dir.exists?(PILLAR_DIRECTORY)
  raise "ERROR: Pillar directory not found.\n\n\033[0m" +
    "You must clone pillar repository to #{PILLAR_DIRECTORY} and/or provide correct path in Vagrantfile"
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
  config.vm.network :private_network, ip: "10.10.0.66"

  # Port forwarding for services running on VM:
  config.vm.network "forwarded_port", guest: 1080, host: 1080   # Mailcatcher
  config.vm.network "forwarded_port", guest: 9200, host: 9200   # ELK-Elasticsearch
  config.vm.network "forwarded_port", guest: 9292, host: 9292   # ELK-Kibana

  # SaltStack masterless setup
  config.vm.synced_folder SALT_DIRECTORY,   "/srv/salt/"
  config.vm.synced_folder PILLAR_DIRECTORY, "/srv/pillar/"
  config.vm.provision :salt do |salt|
    salt.minion_config = "salt/minion"
    salt.run_highstate = true
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
