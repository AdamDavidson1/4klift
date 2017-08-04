deasilworks\cef\EntityManager
===============

Class EntityManager.

Base class for entity managers.
Responsible for implementing methods to retrieve entities and
provides a Statement Manager factory to help accomplish that.


* Class name: EntityManager
* Namespace: deasilworks\cef





Properties
----------


### $collectionClass

    protected string $collectionClass = \deasilworks\cef\ResultContainer::class

A ResultContainer class.



* Visibility: **protected**


### $config

    private \deasilworks\cef\CEFConfig $config





* Visibility: **private**


Methods
-------


### __construct

    mixed deasilworks\cef\EntityManager::__construct(\deasilworks\cef\CEFConfig $config)

EntityManager constructor.

CEFConfig is required for getStatementManager to
produce Statement Managers.

* Visibility: **public**


#### Arguments
* $config **[deasilworks\cef\CEFConfig](deasilworks-cef-CEFConfig.md)**



### getCollection

    \deasilworks\cef\ResultContainer deasilworks\cef\EntityManager::getCollection()

Collection Factory.



* Visibility: **public**




### getModel

    \deasilworks\cef\EntityModel deasilworks\cef\EntityManager::getModel()

Get the model associated with the collection.



* Visibility: **public**




### setCollectionClass

    \deasilworks\cef\EntityManager deasilworks\cef\EntityManager::setCollectionClass(string $collectionClass)





* Visibility: **public**


#### Arguments
* $collectionClass **string**



### getCollectionClass

    string deasilworks\cef\EntityManager::getCollectionClass()





* Visibility: **public**




### getStatementManager

    \deasilworks\cef\StatementManager deasilworks\cef\EntityManager::getStatementManager(string $statementClass)

Statement Manager Factory.



* Visibility: **public**


#### Arguments
* $statementClass **string**



## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.