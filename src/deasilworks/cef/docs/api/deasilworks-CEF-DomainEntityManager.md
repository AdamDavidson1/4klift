deasilworks\CEF\DomainEntityManager
===============

Class DomainEntityManager.

Base class for domain entity managers.


* Class name: DomainEntityManager
* Namespace: deasilworks\CEF
* This is an **abstract** class
* Parent class: [deasilworks\CEF\CEF](deasilworks-CEF-CEF.md)





Properties
----------


### $config

    private \deasilworks\CEF\CEFConfig $config





* Visibility: **private**


### $container

    private \DI\Container $container





* Visibility: **private**


Methods
-------


### __construct

    mixed deasilworks\CEF\CEF::__construct($config)

CEF constructor.



* Visibility: **public**
* This method is defined by [deasilworks\CEF\CEF](deasilworks-CEF-CEF.md)


#### Arguments
* $config **mixed**



### getCfgValue

    mixed deasilworks\CEF\CEF::getCfgValue(string $key, null $default)

Get a value from the CFG Config if one exists,
if not return the provided default, otherwise null.



* Visibility: **public**
* This method is defined by [deasilworks\CEF\CEF](deasilworks-CEF-CEF.md)


#### Arguments
* $key **string**
* $default **null**



### getConfig

    \deasilworks\CEF\CEFConfig deasilworks\CEF\CEF::getConfig()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\CEF](deasilworks-CEF-CEF.md)




### setConfig

    \deasilworks\CEF\CEF deasilworks\CEF\CEF::setConfig(\deasilworks\CEF\CEFConfig $config)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\CEF](deasilworks-CEF-CEF.md)


#### Arguments
* $config **[deasilworks\CEF\CEFConfig](deasilworks-CEF-CEFConfig.md)**



### getManager

    \deasilworks\CEF\EntityDataManager deasilworks\CEF\CEF::getManager(string $mgrClass)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\CEF](deasilworks-CEF-CEF.md)


#### Arguments
* $mgrClass **string**



### getDataManager

    \deasilworks\CEF\EntityDataManager deasilworks\CEF\CEF::getDataManager(string $dataMgrClass)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\CEF](deasilworks-CEF-CEF.md)


#### Arguments
* $dataMgrClass **string**



### getDomainManager

    \deasilworks\CEF\DomainEntityManager deasilworks\CEF\CEF::getDomainManager(string $domainMgrClass)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\CEF](deasilworks-CEF-CEF.md)


#### Arguments
* $domainMgrClass **string**



### getDomainModel

    \deasilworks\CEF\DomainEntityManager deasilworks\CEF\CEF::getDomainModel(string $domainModelClass)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\CEF](deasilworks-CEF-CEF.md)


#### Arguments
* $domainModelClass **string**



### classGetter

    mixed deasilworks\CEF\CEF::classGetter(string $className, array $types)





* Visibility: **private**
* This method is defined by [deasilworks\CEF\CEF](deasilworks-CEF-CEF.md)


#### Arguments
* $className **string**
* $types **array**



### get

    mixed deasilworks\CEF\CEF::get($class)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\CEF](deasilworks-CEF-CEF.md)


#### Arguments
* $class **mixed**



## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.