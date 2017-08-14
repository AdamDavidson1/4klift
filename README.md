
4klift Framework
===========================

<p align="center"><a href="https://github.com/deasilworks/4klift" target="_blank">
    <img src="https://raw.githubusercontent.com/deasilworks/4klift/master/assets/4KLIFT_Logo.png">
</a></p>

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/682ff1742473405d88d14aa949debdc0?)](https://www.codacy.com/app/cjimti/4klift?utm_source=github.com&utm_medium=referral&utm_content=deasilworks/4klift&utm_campaign=badger)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/682ff1742473405d88d14aa949debdc0)](https://www.codacy.com/app/cjimti/4klift?utm_source=github.com&utm_medium=referral&utm_content=deasilworks/4klift&utm_campaign=Badge_Coverage)
[![Style CI](https://styleci.io/repos/96856089/shield?branch=master)](https://styleci.io/repos/96856089)
[![Code Climate](http://img.shields.io/codeclimate/github/deasilworks/4klift.svg?style=flat-square)](https://codeclimate.com/github/deasilworks/4klift)
[![Build Status](https://travis-ci.org/deasilworks/4klift.svg?branch=dev)](https://travis-ci.org/deasilworks/4klift)
[![Latest](https://img.shields.io/packagist/v/deasilworks/4klift.svg?style=flat-square)](https://packagist.org/packages/deasilworks/4klift)
[![Latest Unstable ](https://img.shields.io/packagist/vpre/deasilworks/4klift.svg?style=flat-square)](https://packagist.org/packages/deasilworks/4klift)
[![Total Downloads](https://img.shields.io/packagist/dt/deasilworks/4klift.svg?style=flat-square)](https://packagist.org/packages/deasilworks/4klift)
[![License](https://img.shields.io/github/license/deasilworks/4klift.svg?style=flat-square)](https://packagist.org/packages/deasilworks/4klift)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](http://makeapullrequest.com)

**4klift** is a set of PHP components for developing highly available, redundant and scalable web sites or services on top of Apache Cassandra.

Cassandra makes **4klift** well suited for server side applications requiring greater than 99.99% service availability while also being able to withstand up to millions of read and write operations per second.

This framework of components can be used together or individually. Many components may be used individually in a variety of other frameworks, including Symfony, Silex, Laraval and Drupal.

## Pre-Alpha / In Progress

We are in the process of preparing some of our libraries for open source. This development VM is also a work-in-progress and may result in additional packages installed on provision and eventually a new base box with many of the provisioned requirements pre-installed. However, this remains a useful VM for high performance web development.

We target software that can run on CentOS 6.7. **4klift** is required to run on a wide range of enterprise systems that may be venerable in internet years, but very stable. However, these are simply minimal requirements; every effort is taken to ensure **4klift's** ability to run on modern distributions.

To use the latest dev version, use the *dev-master* branch.

## Components

| Component | Repository |
| :--- | :--- |
| **[API][api-url]**: Annotate existing controllers to create a REST API.                             | [![API 4klift component][api-thumb]][api-url] |
| **[CEF][cef-url]**: Cassandra Entity Framework for data management with models and a query builder. | [![CEF 4klift component][cef-thumb]][cef-url] |
| **[CFG][cfg-url]**: Configuration management.                                                       | [![CFG 4klift component][cfg-thumb]][cfg-url] | 
| **[CMS][cms-url]**: Content management system built to utilize CEF / Cassandra.                     | [![CMS 4klift component][cms-thumb]][cms-url] |

## Installing the 4klift (Silex Edition) Base Project

### [4klift Development Virtual Machine][vm]

**4klift** provides a Vagrant configured virtual machine (VM) containing all the 
services and utilities needed for development. Setting up the VM requires [Vagrant][vagrant-link] 
and [VirtualBox][virtualbox-link]. This development virtual machine works on Mac, Windows and most 
Linux variants. 

### 4klift Requires:

  - [Composer](https://getcomposer.org/ "Composer")
  - [VirtualBox](https://www.virtualbox.org/ "VirtualBox")
  - [Vagrant](https://www.vagrantup.com/ "Vagrant")

### Getting Started

We have a new Getting Started tutorial in-progress. Read more
in the [./docs/README.md][getting-started].
  
##### Create Project

```
    $ mkdir my-project
    $ cd my-project
    $ composer -n --no-install --ignore-platform-reqs create-project deasilworks/4klift-se . 1.0.x-dev
    $ vagrant up
    $ vagrant ssh
````

When running, browse to `http://localhost:8080`.
Or, add the following line to your workstation's *hosts* file:

    192.168.222.11 4klift.vm.deasil.works

... and browse to `http://4klift.vm.deasil.works`.

##### Install the CMS and test the API

``` 
    $ vagrant ssh
    $ ./core/cli --ansi cms-install
````

Now that you have some sample data with the CMS you can run API tests with [postman][postman-link]:

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/be4039e7495cc4402b40#?env%5BLocal%5D=W3siZW5hYmxlZCI6dHJ1ZSwia2V5Ijoic2VydmVyIiwidmFsdWUiOiI0a2xpZnQudm0uZGVhc2lsLndvcmtzIiwidHlwZSI6InRleHQifV0=)


## Changelog and Features

All updates for each release may be reviewed in the [changelog](CHANGELOG.md "4klift Changelog").

## Contributing to 4klift

If you'd like to contribute to the **4klift** project, create component libraries, etc., you can fork and clone the project.

- **[How to Contribute to 4klift](docs/CONTRIBUTING.md "Contributing to 4klift")**
- **[4klift Logos and Assets](assets/README.md "4klift Logos and Assets")**

## Code Quality

4klift and its components attempt to comply with PSR-1, PSR-2, and PSR-4. We welcome pull requests fixing any violations.

## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.

[getting-started]: https://github.com/deasilworks/4klift/tree/master/docs "4klift Getting Started Tutorial"
[vm]: skeleton-se/VM.md "4klift Virtual Machine"
[api-url]: http://github.com/deasilworks/api    
[api-thumb]: https://raw.githubusercontent.com/deasilworks/4klift/master/assets/4KLIFT_Component_API_thumb.png 
[cef-url]: http://github.com/deasilworks/cef    
[cef-thumb]: https://raw.githubusercontent.com/deasilworks/4klift/master/assets/4KLIFT_Component_CEF_thumb.png 
[cfg-url]: http://github.com/deasilworks/cfg    
[cfg-thumb]: https://raw.githubusercontent.com/deasilworks/4klift/master/assets/4KLIFT_Component_CFG_thumb.png
[cms-url]: http://github.com/deasilworks/cms    
[cms-thumb]: https://raw.githubusercontent.com/deasilworks/4klift/master/assets/4KLIFT_Component_CMS_thumb.png 
[postman-link]: https://www.getpostman.com/
[vagrant-link]: https://www.vagrantup.com/downloads.html "Download Vagrant"
[virtualbox-link]: https://www.virtualbox.org/wiki/Downloads "Download VirtualBox"
