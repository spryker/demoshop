# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  # Every Vagrant virtual environment requires a box to build off of.
  config.vm.box = "debian-wheezy64"
  config.vm.hostname = "pyz-vagrant"
  config.vm.box_url = "http://vagrant:mate20mg@salt-development.project-yz.com/debian/debian-wheezy64.box"
  config.vm.boot_timeout = 300

  # The VirtualBox IP-address to which the project domain e.g. zed-development.project-yz.com points
  config.vm.network :private_network, ip: "10.10.0.66"

  config.ssh.forward_agent = true

  config.vm.provision :salt do |salt|
    salt.minion_config = "salt/minion"
    salt.run_highstate = true
    salt.minion_key = "salt/key/dev-vm.pem"
    salt.minion_pub = "salt/key/dev-vm.pub"
    salt.master_key = "salt/key/master.pem"
    salt.master_pub = "salt/key/master.pub"
    salt.verbose = true

    # shared folder used for the dev vm
    config.vm.synced_folder "./", "/data/shop/development/current", type: "nfs"
    config.nfs.map_uid = Process.uid
    config.nfs.map_gid = Process.gid
  end

   config.vm.provider :virtualbox do |vb|
        vb.name = "PYZ Vagrant v.1.0.0"
        vb.customize [
            "modifyvm", :id,
            "--memory", 4096,
            "--cpus", 2
        ]
    end
end
