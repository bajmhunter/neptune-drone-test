Vagrant.configure("2") do |config|

  config.vm.box = "scotch/box"
  config.vm.box_check_update = true

  config.vm.network :private_network, ip: "192.168.46.58"

  config.vm.network "forwarded_port", guest: 80, host: 80

  config.vm.network "public_network"

  config.hostmanager.enabled = true
  config.hostmanager.manage_host = true
  config.hostmanager.manage_guest = true
  config.hostmanager.ignore_private_ip = false
  config.hostmanager.include_offline = true
  config.hostmanager.aliases = %w(p.os pcrt)

  config.vm.provider :virtualbox do |v|

    v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    v.customize ["modifyvm", :id, "--memory", 512]
    v.customize ["modifyvm", :id, "--name", "RepairTracker"]

  end

  config.vm.synced_folder "./", "/var/www", create: true

end
