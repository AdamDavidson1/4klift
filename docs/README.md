[![4klift](https://raw.githubusercontent.com/deasilworks/4klift/master/assets/4KLIFT_Logo_Horizontal_thumb.png)][4klift]

Getting Started
---------------

For this **getting started** tutorial we are going to write a simple
data collection and reporting web site and service with 4klift.

The Apache Cassandra database is designed for very a high number
of simultaneous read and write operations.

> **This tutorial is in-progress and will be added to as 4klift is
built up from new development and our own existing refactored libraries.**

### 4klift Requires:

  - [Composer](https://getcomposer.org/ "Composer")
  - [VirtualBox](https://www.virtualbox.org/ "VirtualBox")
  - [Vagrant](https://www.vagrantup.com/ "Vagrant")
  
The 4klift-se (Silex Edition) project includes a configured virtual 
machine with everyting you need to develop a new project. 

>See the [VM.md][vm] documentation for a current list of applications 
and services.  

#### 1. Create Project

Open a terminal on your workstation and create a new directory 
called `collector`. In this directory use `composer` to create
a new **4klift-se** project. After 'composer' has downloaded the
project skeleton use `vagrant` to boot and provision the virtual
machine.

```
    $ mkdir collector
    $ cd collector
    $ composer -n --no-install --ignore-platform-reqs create-project deasilworks/4klift-se . 1.0.x-dev
    $ vagrant up
    $ vagrant ssh
````

Once the virtual machine is booted it will use `composer` internally
to download dependencies and configure and autoloader. We do this
installation on the virtual machine to reduce the number on dependencies 
on a developer's individual workstation. This ensures everyone on the team
has a common environment that meets the minimum requirements.

Once the virtual machine has completed provisioning you will see:

```
    ==> default: ----------------------------------------------------
    ==> default:
    ==> default:  _  _   _    _ _  __ _
    ==> default: | || | | | _| (_)/ _| |_
    ==> default: | || |_| |/ / | | |_| __|
    ==> default: |__   _|   <| | |  _| |_
    ==> default:    |_| |_|\_\_|_|_|  \__|
    ==> default:
    ==> default:
    ==> default: Install complete.
    ==> default:
    ==> default: Browse to http://localhost:8080/
    ==> default:
    ==> default: Run: vagrant ssh to use the new vm.
    ==> default:
```


When running, browse to `http://localhost:8080`.

Or, add the following line (or replace with your own domain) to your workstation's *hosts* file:

    192.168.222.11 collector.vm.deasil.works

... and browse to `http://collector.vm.deasil.works`.

#### 2. Create a [Keyspace][cas-keyspace] in Cassandra.


##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.


[vm]: skeleton-se/VM.md "4klift Virtual Machine"
[4klift]: https://github.com/deasilworks/4klift
[cas-keyspace]: http://docs.datastax.com/en/cql/3.3/cql/cql_reference/cqlCreateKeyspace.html