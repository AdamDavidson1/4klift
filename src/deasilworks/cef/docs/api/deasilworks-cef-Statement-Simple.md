deasilworks\cef\Statement\Simple
===============

Class Simple.

Responsible for executing CQL statements and providing a
StatementBuilder factory.


* Class name: Simple
* Namespace: deasilworks\cef\Statement
* Parent class: [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)





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

    protected \deasilworks\cef\StatementBuilder $statementBuilder





* Visibility: **protected**


### $config

    protected \deasilworks\cef\CEFConfig $config





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

    protected \deasilworks\cef\EntityManager; $entityManager





* Visibility: **protected**


### $transformerClass

    protected string $transformerClass = \deasilworks\cef\Cassandra\Transformer::class





* Visibility: **protected**


### $resultClass

    protected string $resultClass = \deasilworks\cef\ResultContainer::class

ResultContainer class.



* Visibility: **protected**


### $resultModelClass

    protected string $resultModelClass = \deasilworks\cef\EntityModel::class

EntityModel class.



* Visibility: **protected**


Methods
-------


### setStatement

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setStatement(string|\deasilworks\cef\StatementBuilder $simpleStatement)





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)


#### Arguments
* $simpleStatement **string|[string](deasilworks-cef-StatementBuilder.md)**



### __construct

    mixed deasilworks\cef\StatementManager::__construct(\deasilworks\cef\CEFConfig $config, \deasilworks\cef\EntityManager $entityManager)

StatementManager constructor.



* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)


#### Arguments
* $config **[deasilworks\cef\CEFConfig](deasilworks-cef-CEFConfig.md)**
* $entityManager **[deasilworks\cef\EntityManager](deasilworks-cef-EntityManager.md)**



### getTransformerClass

    string deasilworks\cef\StatementManager::getTransformerClass()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### setTransformerClass

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setTransformerClass(string $transformerClass)





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)


#### Arguments
* $transformerClass **string**



### getTransformer

    mixed deasilworks\cef\StatementManager::getTransformer()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### getEntityManager

    \deasilworks\cef\EntityManager deasilworks\cef\StatementManager::getEntityManager()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### setEntityManager

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setEntityManager(\deasilworks\cef\EntityManager $entityManager)





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)


#### Arguments
* $entityManager **[deasilworks\cef\EntityManager](deasilworks-cef-EntityManager.md)**



### getCluster

    mixed deasilworks\cef\StatementManager::getCluster()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### getSession

    \Cassandra\Session deasilworks\cef\StatementManager::getSession()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### getConsistency

    mixed deasilworks\cef\StatementManager::getConsistency()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### setConsistency

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setConsistency(mixed|null $consistency)





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)


#### Arguments
* $consistency **mixed|null**



### getRetryPolicy

    mixed deasilworks\cef\StatementManager::getRetryPolicy()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### setRetryPolicy

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setRetryPolicy(mixed|null $retryPolicy)





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)


#### Arguments
* $retryPolicy **mixed|null**



### setArguments

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setArguments(null|array $arguments)





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)


#### Arguments
* $arguments **null|array**



### getArguments

    array|null deasilworks\cef\StatementManager::getArguments()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### getSb

    \DeasilWorks\CEF\StatementBuilder deasilworks\cef\StatementManager::getSb()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### setSb

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setSb(\DeasilWorks\CEF\StatementBuilder $statementBuilder)





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)


#### Arguments
* $statementBuilder **DeasilWorks\CEF\StatementBuilder**



### getStatement

    \Cassandra\Statement deasilworks\cef\StatementManager::getStatement()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### reset

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::reset()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### executeStatement

    mixed deasilworks\cef\StatementManager::executeStatement(string $type)





* Visibility: **private**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)


#### Arguments
* $type **string**



### execute

    \deasilworks\cef\ResultContainer deasilworks\cef\StatementManager::execute()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### getResultContainerClass

    string deasilworks\cef\StatementManager::getResultContainerClass()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### setResultContainerClass

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setResultContainerClass(string $resultClass)





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)


#### Arguments
* $resultClass **string**



### getResultContainer

    \deasilworks\cef\ResultContainer deasilworks\cef\StatementManager::getResultContainer()

Result Container Factory.



* Visibility: **private**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### getResultModelClass

    string deasilworks\cef\StatementManager::getResultModelClass()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### setResultModelClass

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setResultModelClass(string $resultModelClass)





* Visibility: **protected**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)


#### Arguments
* $resultModelClass **string**



### getResultModel

    \deasilworks\cef\EntityModel deasilworks\cef\StatementManager::getResultModel()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)




### getStatementBuilder

    \DeasilWorks\CEF\StatementBuilder deasilworks\cef\StatementManager::getStatementBuilder($builderClass)





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)


#### Arguments
* $builderClass **mixed**



### previousArgs

    mixed deasilworks\cef\StatementManager::previousArgs(array $previousArgs)





* Visibility: **private**
* This method is defined by [deasilworks\cef\StatementManager](deasilworks-cef-StatementManager.md)


#### Arguments
* $previousArgs **array**



## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.