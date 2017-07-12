4klift (Forklift) Framework
===========================

[![Latest Stable Version](https://poser.pugx.org/deasilworks/4klift/v/stable)](https://packagist.org/packages/deasilworks/4klift)
[![Total Downloads](https://poser.pugx.org/deasilworks/4klift/downloads)](https://packagist.org/packages/deasilworks/4klift)
[![Total Downloads](https://poser.pugx.org/deasilworks/4klift/downloads)](https://packagist.org/packages/deasilworks/4klift)
[![License](https://poser.pugx.org/deasilworks/4klift/license)](https://packagist.org/packages/deasilworks/4klift)
[![Monthly Downloads](https://poser.pugx.org/deasilworks/4klift/d/monthly)](https://packagist.org/packages/deasilworks/4klift)
[![composer.lock](https://poser.pugx.org/deasilworks/4klift/composerlock)](https://packagist.org/packages/deasilworks/4klift)

TBD

**No code yet**. We are still in the process of preparing some of our libraries for open source. This development vm is also a work-in-progress and may result in additional packages installed on provision and eventually a new base box with many of the provisioned requirements pre-installed. However this is a useful vm for high performance web development.

We target software that can run on CentOS 6.6. 4klift is required to run on a wide range of enterprise systems that may be quite old (in internet years) but very stable. However this is simply the minimal requirements and every effort is taken to ensure the ability to run on modern distributions and old alike.

The 4klift development vm currently consists of the following packages:

  - CentOS 6.6
  - java-1.8.0-openjdk
  - Apache Cassandra 3.9.0 (CQL spec 3.4.2)
  - cqlsh 5.0.1
  - nginx 1.10.2
  - PHP/php-fpm 5.6.31
  - composer >=1.4.2
  - PHPUnit 5.7.21
  - NodeJS 6.11.1
  - npm 3.10.10
  - Sass 3.4.25
  - bower 1.8.0
  - yarn 0.27.5
  - git 1.7.1


## Installing 4klift Base Project


Get and run:

    composer create-project -s dev deasilworks/4klift dev-dev
    cd 4klift
    vagrant up
    vagrant ssh
    
Browse to `http://localhost:8080` or add `192.168.222.11 4klift.vm.deasil.works` to your workstation's host file.

## Development Environment - Vagrant & Virtualbox

Use for developing 4klift based projects and 4klift framework development.

Requires Virtualbox, Vagrant and the vagrant-vbgust plugin. This development
virtual machine works on Mac, Windows or most Linux variants. 

### Mac Install Requirements:

Install Homebrew if you don't have it;

    /usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"

Install Virtualbox and Vagrant with `brew`:

    brew cask install virtualbox
    brew cask install vagrant

## Contributing to 4klift

`git clone https://github.com/deasilworks/4klift.git` and fork.

TBD - Development process
    


    
