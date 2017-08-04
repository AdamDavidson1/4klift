deasilworks\cef\StatementManager
===============

Class StatementManager.

Responsible for executing CQL statements and providing a
StatementBuilder factory.


* Class name: StatementManager
* Namespace: deasilworks\cef





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


### __construct

    mixed deasilworks\cef\StatementManager::__construct(\deasilworks\cef\CEFConfig $config, \deasilworks\cef\EntityManager $entityManager)

StatementManager constructor.



* Visibility: **public**


#### Arguments
* $config **[deasilworks\cef\CEFConfig](deasilworks-cef-CEFConfig.md)**
* $entityManager **[deasilworks\cef\EntityManager](deasilworks-cef-EntityManager.md)**



### getTransformerClass

    string deasilworks\cef\StatementManager::getTransformerClass()





* Visibility: **public**




### setTransformerClass

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setTransformerClass(string $transformerClass)





* Visibility: **public**


#### Arguments
* $transformerClass **string**



### getTransformer

    mixed deasilworks\cef\StatementManager::getTransformer()





* Visibility: **public**




### getEntityManager

    \deasilworks\cef\EntityManager deasilworks\cef\StatementManager::getEntityManager()





* Visibility: **public**




### setEntityManager

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setEntityManager(\deasilworks\cef\EntityManager $entityManager)





* Visibility: **public**


#### Arguments
* $entityManager **[deasilworks\cef\EntityManager](deasilworks-cef-EntityManager.md)**



### getCluster

    mixed deasilworks\cef\StatementManager::getCluster()





* Visibility: **public**




### getSession

    \Cassandra\Session deasilworks\cef\StatementManager::getSession()





* Visibility: **public**




### getConsistency

    mixed deasilworks\cef\StatementManager::getConsistency()





* Visibility: **public**




### setConsistency

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setConsistency(mixed|null $consistency)





* Visibility: **public**


#### Arguments
* $consistency **mixed|null**



### getRetryPolicy

    mixed deasilworks\cef\StatementManager::getRetryPolicy()





* Visibility: **public**




### setRetryPolicy

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setRetryPolicy(mixed|null $retryPolicy)





* Visibility: **public**


#### Arguments
* $retryPolicy **mixed|null**



### setArguments

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setArguments(null|array $arguments)





* Visibility: **public**


#### Arguments
* $arguments **null|array**



### getArguments

    array|null deasilworks\cef\StatementManager::getArguments()





* Visibility: **public**




### getSb

    \DeasilWorks\CEF\StatementBuilder deasilworks\cef\StatementManager::getSb()





* Visibility: **public**




### setSb

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setSb(\DeasilWorks\CEF\StatementBuilder $statementBuilder)





* Visibility: **public**


#### Arguments
* $statementBuilder **DeasilWorks\CEF\StatementBuilder**



### setStatement

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setStatement(string|\deasilworks\cef\StatementBuilder $simpleStatement)





* Visibility: **public**


#### Arguments
* $simpleStatement **string|[string](deasilworks-cef-StatementBuilder.md)**



### getStatement

    \Cassandra\Statement deasilworks\cef\StatementManager::getStatement()





* Visibility: **public**




### reset

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::reset()





* Visibility: **public**




### executeStatement

    mixed deasilworks\cef\StatementManager::executeStatement(string $type)





* Visibility: **private**


#### Arguments
* $type **string**



### execute

    \deasilworks\cef\ResultContainer deasilworks\cef\StatementManager::execute()





* Visibility: **public**




### getResultContainerClass

    string deasilworks\cef\StatementManager::getResultContainerClass()





* Visibility: **public**




### setResultContainerClass

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setResultContainerClass(string $resultClass)





* Visibility: **public**


#### Arguments
* $resultClass **string**



### getResultContainer

    \deasilworks\cef\ResultContainer deasilworks\cef\StatementManager::getResultContainer()

Result Container Factory.



* Visibility: **private**




### getResultModelClass

    string deasilworks\cef\StatementManager::getResultModelClass()





* Visibility: **public**




### setResultModelClass

    \deasilworks\cef\StatementManager deasilworks\cef\StatementManager::setResultModelClass(string $resultModelClass)





* Visibility: **protected**


#### Arguments
* $resultModelClass **string**



### getResultModel

    \deasilworks\cef\EntityModel deasilworks\cef\StatementManager::getResultModel()





* Visibility: **public**




### getStatementBuilder

    \DeasilWorks\CEF\StatementBuilder deasilworks\cef\StatementManager::getStatementBuilder($builderClass)





* Visibility: **public**


#### Arguments
* $builderClass **mixed**



### previousArgs

    mixed deasilworks\cef\StatementManager::previousArgs(array $previousArgs)





* Visibility: **private**


#### Arguments
* $previousArgs **array**



## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.