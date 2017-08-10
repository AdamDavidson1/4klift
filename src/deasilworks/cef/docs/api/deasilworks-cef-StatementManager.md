deasilworks\CEF\StatementManager
===============

Class StatementManager.

Responsible for executing CQL statements and providing a
StatementBuilder factory.


* Class name: StatementManager
* Namespace: deasilworks\CEF





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


### __construct

    mixed deasilworks\CEF\StatementManager::__construct(\deasilworks\CEF\CEFConfig $config, \deasilworks\CEF\EntityDataManager $entityManager)

StatementManager constructor.



* Visibility: **public**


#### Arguments
* $config **[deasilworks\CEF\CEFConfig](deasilworks-CEF-CEFConfig.md)**
* $entityManager **[deasilworks\CEF\EntityDataManager](deasilworks-CEF-EntityDataManager.md)**



### getTransformerClass

    string deasilworks\CEF\StatementManager::getTransformerClass()





* Visibility: **public**




### setTransformerClass

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setTransformerClass(string $transformerClass)





* Visibility: **public**


#### Arguments
* $transformerClass **string**



### getTransformer

    mixed deasilworks\CEF\StatementManager::getTransformer()





* Visibility: **public**




### getEntityManager

    \deasilworks\CEF\EntityDataManager deasilworks\CEF\StatementManager::getEntityManager()





* Visibility: **public**




### setEntityManager

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setEntityManager(\deasilworks\CEF\EntityDataManager $entityManager)





* Visibility: **public**


#### Arguments
* $entityManager **[deasilworks\CEF\EntityDataManager](deasilworks-CEF-EntityDataManager.md)**



### getCluster

    mixed deasilworks\CEF\StatementManager::getCluster()





* Visibility: **public**




### getSession

    \Cassandra\Session deasilworks\CEF\StatementManager::getSession()





* Visibility: **public**




### getConsistency

    mixed deasilworks\CEF\StatementManager::getConsistency()





* Visibility: **public**




### setConsistency

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setConsistency(mixed|null $consistency)





* Visibility: **public**


#### Arguments
* $consistency **mixed|null**



### getRetryPolicy

    mixed deasilworks\CEF\StatementManager::getRetryPolicy()





* Visibility: **public**




### setRetryPolicy

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setRetryPolicy(mixed|null $retryPolicy)





* Visibility: **public**


#### Arguments
* $retryPolicy **mixed|null**



### setArguments

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setArguments(null|array $arguments)





* Visibility: **public**


#### Arguments
* $arguments **null|array**



### getArguments

    array|null deasilworks\CEF\StatementManager::getArguments()





* Visibility: **public**




### getSb

    \DeasilWorks\CEF\StatementBuilder deasilworks\CEF\StatementManager::getSb()





* Visibility: **public**




### setSb

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setSb(\DeasilWorks\CEF\StatementBuilder $statementBuilder)





* Visibility: **public**


#### Arguments
* $statementBuilder **DeasilWorks\CEF\StatementBuilder**



### setStatement

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setStatement(string|\deasilworks\CEF\StatementBuilder $simpleStatement)





* Visibility: **public**


#### Arguments
* $simpleStatement **string|[string](deasilworks-CEF-StatementBuilder.md)**



### getStatement

    \Cassandra\Statement deasilworks\CEF\StatementManager::getStatement()





* Visibility: **public**




### reset

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::reset()





* Visibility: **public**




### executeStatement

    mixed deasilworks\CEF\StatementManager::executeStatement(string $type)





* Visibility: **private**


#### Arguments
* $type **string**



### execute

    \deasilworks\CEF\ResultContainer deasilworks\CEF\StatementManager::execute()





* Visibility: **public**




### getResultContainerClass

    string deasilworks\CEF\StatementManager::getResultContainerClass()





* Visibility: **public**




### setResultContainerClass

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setResultContainerClass(string $resultClass)





* Visibility: **public**


#### Arguments
* $resultClass **string**



### getResultContainer

    \deasilworks\CEF\ResultContainer deasilworks\CEF\StatementManager::getResultContainer()

Result Container Factory.



* Visibility: **private**




### getResultModelClass

    string deasilworks\CEF\StatementManager::getResultModelClass()





* Visibility: **public**




### setResultModelClass

    \deasilworks\CEF\StatementManager deasilworks\CEF\StatementManager::setResultModelClass(string $resultModelClass)





* Visibility: **protected**


#### Arguments
* $resultModelClass **string**



### getResultModel

    \deasilworks\CEF\EntityDataModel deasilworks\CEF\StatementManager::getResultModel()





* Visibility: **public**




### getStatementBuilder

    \DeasilWorks\CEF\StatementBuilder deasilworks\CEF\StatementManager::getStatementBuilder($builderClass)





* Visibility: **public**


#### Arguments
* $builderClass **mixed**



### previousArgs

    mixed deasilworks\CEF\StatementManager::previousArgs(array $previousArgs)





* Visibility: **private**


#### Arguments
* $previousArgs **array**



## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.