deasilworks\CEF\Statement\Simple
===============

Class Simple.

Responsible for executing CQL statements and providing a
StatementBuilder factory.


* Class name: Simple
* Namespace: deasilworks\CEF\Statement
* Parent class: [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)





Properties
----------


### $session

    protected \Cassandra\Session $session





* Visibility: **protected**


### $cluster

    protected \Cassandra\Cluster\Builder $cluster





* Visibility: **protected**


### $statement

    protected \Cassandra\Statement $statement





* Visibility: **protected**


### $statementBuilder

    protected \deasilworks\CEF\StatementBuilder $statementBuilder





* Visibility: **protected**


### $config

    protected \deasilworks\CEF\CEFConfig $config





* Visibility: **protected**


### $consistency

    protected mixed $consistency





* Visibility: **protected**


### $retryPolicy

    protected mixed $retryPolicy





* Visibility: **protected**


### $arguments

    protected array $arguments





* Visibility: **protected**


### $previousArguments

    protected array $previousArguments





* Visibility: **protected**


### $entityManager

    protected \deasilworks\CEF\EntityDataManager; $entityManager





* Visibility: **protected**


### $transformerClass

    protected string $transformerClass = \deasilworks\CEF\Cassandra\Transformer::class





* Visibility: **protected**


### $resultClass

    protected string $resultClass = \deasilworks\CEF\ResultContainer::class

ResultContainer class.



* Visibility: **protected**


### $resultModelClass

    protected string $resultModelClass = \deasilworks\CEF\EntityDataModel::class

EntityModel class.



* Visibility: **protected**


Methods
-------


### setStatement

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setStatement(string|\deasilworks\CEF\StatementBuilder $simpleStatement)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)


#### Arguments
* $simpleStatement **string|[string](deasilworks-CEF-StatementBuilder.md)**



### __construct

    mixed deasilworks\CEF\StatementManager::__construct(\deasilworks\CEF\CEFConfig $config, \deasilworks\CEF\EntityDataManager $entityManager)

StatementManager constructor.



* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)


#### Arguments
* $config **[deasilworks\CEF\CEFConfig](deasilworks-CEF-CEFConfig.md)**
* $entityManager **[deasilworks\CEF\EntityDataManager](deasilworks-CEF-EntityDataManager.md)**



### getTransformerClass

    string deasilworks\CEF\StatementManager::getTransformerClass()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### setTransformerClass

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setTransformerClass(string $transformerClass)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)


#### Arguments
* $transformerClass **string**



### getTransformer

    mixed deasilworks\CEF\StatementManager::getTransformer()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### getEntityManager

    \deasilworks\CEF\EntityDataManager deasilworks\CEF\StatementManager::getEntityManager()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### setEntityManager

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setEntityManager(\deasilworks\CEF\EntityDataManager $entityManager)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)


#### Arguments
* $entityManager **[deasilworks\CEF\EntityDataManager](deasilworks-CEF-EntityDataManager.md)**



### getCluster

    mixed deasilworks\CEF\StatementManager::getCluster()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### getSession

    \Cassandra\Session deasilworks\CEF\StatementManager::getSession()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### getConsistency

    mixed deasilworks\CEF\StatementManager::getConsistency()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### setConsistency

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setConsistency(mixed|null $consistency)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)


#### Arguments
* $consistency **mixed|null**



### getRetryPolicy

    mixed deasilworks\CEF\StatementManager::getRetryPolicy()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### setRetryPolicy

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setRetryPolicy(mixed|null $retryPolicy)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)


#### Arguments
* $retryPolicy **mixed|null**



### setArguments

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setArguments(null|array $arguments)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)


#### Arguments
* $arguments **null|array**



### getArguments

    array|null deasilworks\CEF\StatementManager::getArguments()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### getSb

    \DeasilWorks\CEF\StatementBuilder deasilworks\CEF\StatementManager::getSb()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### setSb

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setSb(\DeasilWorks\CEF\StatementBuilder $statementBuilder)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)


#### Arguments
* $statementBuilder **DeasilWorks\CEF\StatementBuilder**



### getStatement

    \Cassandra\Statement deasilworks\CEF\StatementManager::getStatement()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### reset

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::reset()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### executeStatement

    mixed deasilworks\CEF\StatementManager::executeStatement(string $type)





* Visibility: **private**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)


#### Arguments
* $type **string**



### execute

    \deasilworks\CEF\ResultContainer deasilworks\CEF\StatementManager::execute()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### getResultContainerClass

    string deasilworks\CEF\StatementManager::getResultContainerClass()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### setResultContainerClass

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setResultContainerClass(string $resultClass)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)


#### Arguments
* $resultClass **string**



### getResultContainer

    \deasilworks\CEF\ResultContainer deasilworks\CEF\StatementManager::getResultContainer()

Result Container Factory.



* Visibility: **private**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### getResultModelClass

    string deasilworks\CEF\StatementManager::getResultModelClass()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### setResultModelClass

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setResultModelClass(string $resultModelClass)





* Visibility: **protected**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)


#### Arguments
* $resultModelClass **string**



### getResultModel

    \deasilworks\CEF\EntityDataModel deasilworks\CEF\StatementManager::getResultModel()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)




### getStatementBuilder

    \DeasilWorks\CEF\StatementBuilder deasilworks\CEF\StatementManager::getStatementBuilder($builderClass)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)


#### Arguments
* $builderClass **mixed**



### previousArgs

    mixed deasilworks\CEF\StatementManager::previousArgs(array $previousArgs)





* Visibility: **private**
* This method is defined by [deasilworks\CEF\StatementManager](deasilworks-CEF-StatementManager.md)


#### Arguments
* $previousArgs **array**



## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.