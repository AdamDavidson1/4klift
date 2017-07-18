4klift (Forklift) Framework
===========================

[![Build Status](https://travis-ci.org/deasilworks/4klift.svg?branch=dev)](https://travis-ci.org/deasilworks/4klift)
[![Latest Stable Version](https://poser.pugx.org/deasilworks/4klift/v/stable)](https://packagist.org/packages/deasilworks/4klift)
[![Latest Unstable Version](https://poser.pugx.org/deasilworks/4klift/v/unstable)](https://packagist.org/packages/deasilworks/4klift)
[![Total Downloads](https://poser.pugx.org/deasilworks/4klift/downloads)](https://packagist.org/packages/deasilworks/4klift)
[![License](https://poser.pugx.org/deasilworks/4klift/license)](https://packagist.org/packages/deasilworks/4klift)

TBD

**No code yet**. We are still in the process of preparing some of our libraries for open source. This development vm is also a work-in-progress and may result in additional packages installed on provision and eventually a new base box with many of the provisioned requirements pre-installed. However this is a useful vm for high performance web development.

We target software that can run on CentOS 6.6. 4klift is required to run on a wide range of enterprise systems that may be quite old (in internet years) but very stable. However this is simply the minimal requirements and every effort is taken to ensure the ability to run on modern distributions and old alike.

The 4klift development vm currently consists of the following packages:

  - [CentOS 6.6](https://www.centos.org/)
  - [java-1.8.0-openjdk](http://openjdk.java.net/)
  - [Apache Cassandra 3.9.0 (CQL spec 3.4.2) (datastax-ddc)](https://academy.datastax.com/planet-cassandra/cassandra)
  - [cqlsh 5.0.1](http://docs.datastax.com/en/cql/3.3/cql/cql_reference/cqlsh.html)
  - [nginx 1.10.2](https://nginx.org/en/)
  - [PHP 5.6.31](http://php.net/) / [php-fpm](https://php-fpm.org/)
  - [composer >=1.4.2](https://getcomposer.org/)
  - [PHPUnit 5.7.21](https://phpunit.de/)
  - [NodeJS 6.11.1](https://nodejs.org/en/)
  - [npm 3.10.10](https://www.npmjs.com/)
  - [Sass 3.4.25](http://sass-lang.com/)
  - [bower 1.8.0](https://bower.io/)
  - [yarn 0.27.5](https://yarnpkg.com/en/)
  - [git 1.7.1](https://git-scm.com/)


## Installing 4klift Base Project


Get and run:

    composer create-project -s dev deasilworks/4klift 4klift dev-master
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
    


    
