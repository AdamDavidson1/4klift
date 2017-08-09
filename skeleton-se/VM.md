[![4klift](https://raw.githubusercontent.com/deasilworks/4klift/master/assets/4KLIFT_Logo_Horizontal_thumb.png)](README.md "4klift")
  
 ## The 4klift Development Virtual Machine

**4klift** provides a Vagrant configured virtual machine (VM) containing all the 
services and utilities needed for development. Setting up the VM requires [Vagrant][vagrant-link] 
and [VirtualBox][virtualbox-link]. This development virtual machine works on Mac, Windows and most 
Linux variants. 

Install for the appropriate platform:

  - [Vagrant][vagrant-link]
  - [VirtualBox][virtualbox-link]

Provisioning the VM will require the vagrant-vbguest plugin.
   
    vagrant plugin install vagrant-vbguest

## What's on the Virtual Machine?

The 4klift development VM currently consists of the following packages:

  - [CentOS 6.7](https://www.centos.org/)
  - [java-1.8.0-openjdk](http://openjdk.java.net/)
  - [Apache Cassandra 3.9.0 (CQL spec 3.4.2) (datastax-ddc)](https://academy.datastax.com/planet-cassandra/cassandra)
  - [cqlsh 5.0.1](http://docs.datastax.com/en/cql/3.3/cql/cql_reference/cqlsh.html)
  - [NGINX 1.10.2](https://nginx.org/en/)
  - [PHP 5.6.31](http://php.net/) / [php-fpm](https://php-fpm.org/)
  - [Composer >=1.4.2](https://getcomposer.org/)
  - [PHPUnit 5.7.21](https://phpunit.de/)
  - [NodeJS 6.11.1](https://nodejs.org/en/)
  - [npm 3.10.10](https://www.npmjs.com/)
  - [Sass 3.4.25](http://sass-lang.com/)
  - [Bower 1.8.0](https://bower.io/)
  - [Yarn 0.27.5](https://yarnpkg.com/en/)
  - [git 1.7.1](https://git-scm.com/)

## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.

[vagrant-link]: https://www.vagrantup.com/downloads.html "Download Vagrant"
[virtualbox-link]: https://www.virtualbox.org/wiki/Downloads "Download VirtualBox"