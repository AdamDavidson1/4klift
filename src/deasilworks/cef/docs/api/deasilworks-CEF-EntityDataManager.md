deasilworks\CEF\EntityDataManager
===============

Class EntityManager.

Base class for entity managers.
Responsible for implementing methods to retrieve entities and
provides a Statement Manager factory to help accomplish that.


* Class name: EntityDataManager
* Namespace: deasilworks\CEF





Properties
----------


### $collectionClass

    protected string $collectionClass = \deasilworks\CEF\ResultContainer::class

A ResultContainer class.



* Visibility: **protected**


### $config

    private \deasilworks\CEF\CEFConfig $config





* Visibility: **private**


Methods
-------


### __construct

    mixed deasilworks\CEF\EntityDataManager::__construct(\deasilworks\CEF\CEFConfig $config)

EntityManager constructor.

CEFConfig is required for getStatementManager to
produce Statement Managers.

* Visibility: **public**


#### Arguments
* $config **[deasilworks\CEF\CEFConfig](deasilworks-CEF-CEFConfig.md)**



### getCollection

    \deasilworks\CEF\ResultContainer deasilworks\CEF\EntityDataManager::getCollection()

Collection Factory.



* Visibility: **public**




### getModel

    \deasilworks\CEF\EntityDataModel deasilworks\CEF\EntityDataManager::getModel()

Get the model associated with the collection.



* Visibility: **public**




### setCollectionClass

    \deasilworks\CEF\EntityDataManager deasilworks\CEF\EntityDataManager::setCollectionClass(string $collectionClass)





* Visibility: **public**


#### Arguments
* $collectionClass **string**



### getCollectionClass

    string deasilworks\CEF\EntityDataManager::getCollectionClass()





* Visibility: **public**




### getStatementManager

    \deasilworks\CEF\StatementManager deasilworks\CEF\EntityDataManager::getStatementManager(string $statementClass)

Statement Manager Factory.



* Visibility: **public**


#### Arguments
* $statementClass **string**



## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.