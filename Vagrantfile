# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

hostname = '4klift.vm.deasil.works'

$provision_script = <<SCRIPT
    yum install -y centos-release-SCL scl-utils-build --enablerepo=extras

    rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-6.noarch.rpm
    rpm -Uvh https://rpms.remirepo.net/enterprise/remi-release-6.rpm
    ln -sf /home/vagrant/project/dev/vm/datastax.repo /etc/yum.repos.d/datastax.repo

    yum install -y figlet python27 java-1.8.0-openjdk datastax-ddc nginx gcc g++ make automake autoconf
    yum install -y curl-devel openssl-devel zlib-devel httpd-devel apr-devel apr-util-devel sqlite-devel
    yum install -y ruby-rdoc ruby-devel rubygems
    yum install -y php-fpm php php-devel php-mysql git --enablerepo=remi-php56

    rm -f /home/vagrant/.bashrc
    ln -sf /home/vagrant/project/dev/vm/bashrc /home/vagrant/.bashrc

    service cassandra start
    scl enable python27 "pip install cqlsh"

    service php-fpm start
    rm -f /etc/php-fpm.d/www.conf
    ln -sf /home/vagrant/project/dev/vm/www.conf /etc/php-fpm.d/www.conf
    service php-fpm restart

    rm -f /etc/nginx/nginx.conf
    ln -sf /home/vagrant/project/dev/vm/nginx.conf /etc/nginx/nginx.conf
    ln -sf /home/vagrant/project/dev/vm/4klift.conf /etc/nginx/conf.d/4klift.conf

    service nginx start

    curl -sS https://getcomposer.org/installer | php
    mv composer.phar /usr/local/bin/composer

    wget -q https://dl.yarnpkg.com/rpm/yarn.repo -O /etc/yum.repos.d/yarn.repo
    curl --silent --location https://rpm.nodesource.com/setup_6.x | bash -
    yum install -y nodejs yarn
    npm install -g bower
    npm install -g webpack
    gem install sass

    wget -q https://phar.phpunit.de/phpunit-5.7.phar -O /usr/local/bin/phpunit
    chmod 775 /usr/local/bin/phpunit
SCRIPT


Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

    config.vm.box = "bento/centos-6.7"
    config.vbguest.auto_update = false

    config.vm.provision "shell", inline: $provision_script
    config.vm.synced_folder ".", "/home/vagrant/project", disabled: false, type: "virtualbox"

    config.vm.network "private_network", ip: "192.168.222.11"
    config.vm.network "forwarded_port", guest: 80, host: 8080
    config.ssh.forward_agent = true

    config.vm.hostname = hostname

    config.vm.provider "virtualbox" do |v|
      host = RbConfig::CONFIG['host_os']

      # Give VM 2/4 system memory & access to all cpu cores on the host if mac or linux
      # otherwise 4 cpus and 2048 memory for all other platforms.

      if host =~ /darwin/
        cpus = `sysctl -n hw.ncpu`.to_i
        mem = `sysctl -n hw.memsize`.to_i / 1024 / 1024 / 2
      elsif host =~ /linux/
        cpus = `nproc`.to_i
        mem = `grep 'MemTotal' /proc/meminfo | sed -e 's/MemTotal://' -e 's/ kB//'`.to_i / 1024 / 2
      else
        cpus = 4
        mem = 2048
      end

      v.memory = mem
      v.cpus = cpus
    end

end

