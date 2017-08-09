4klift SE (Silex Edition)
===========================

[![4klift](https://raw.githubusercontent.com/deasilworks/4klift/master/assets/4KLIFT_Logo_Horizontal_thumb.png)][4klift]

For detailed installation instructions, getting started guide and documentation see the [4klift project][4klift].

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
  
##### Create Project
    
    mkdir my-project
    cd my-project
    composer -n --no-install create-project deasilworks/4klift-se . 1.0.x-dev
    vagrant up
    vagrant ssh

When running, browse to `http://localhost:8080`.
Or, add the following line to your workstation's *hosts* file:

    192.168.222.11 4klift.vm.deasil.works

... and browse to `http://4klift.vm.deasil.works`.

##### Install the CMS and test the API

    vagrant ssh
    ./core/cli --ansi cms-install

Now that you have some sample data with the CMS you can run API tests with [postman][postman-link]:

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/be4039e7495cc4402b40#?env%5BLocal%5D=W3siZW5hYmxlZCI6dHJ1ZSwia2V5Ijoic2VydmVyIiwidmFsdWUiOiI0a2xpZnQudm0uZGVhc2lsLndvcmtzIiwidHlwZSI6InRleHQifV0=)

## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.

[vm]: VM.md "4klift Virtual Machine"
[4klift]: https://github.com/deasilworks/4klift
[vagrant-link]: https://www.vagrantup.com/downloads.html "Download Vagrant"
[virtualbox-link]: https://www.virtualbox.org/wiki/Downloads "Download VirtualBox"
[postman-link]: https://www.getpostman.com/
