deasilworks\CEF\CEFConfig
===============

Class CEFConfig.




* Class name: CEFConfig
* Namespace: deasilworks\CEF





Properties
----------


### $username

    protected string $username





* Visibility: **protected**


### $password

    protected string $password





* Visibility: **protected**


### $keyspace

    protected string $keyspace





* Visibility: **protected**


### $contactPoints

    protected array $contactPoints





* Visibility: **protected**


### $clusterBuilder

    protected \Cassandra\Cluster\Builder $clusterBuilder





* Visibility: **protected**


### $cluster

    protected \Cassandra\Cluster $cluster





* Visibility: **protected**


Methods
-------


### __construct

    mixed deasilworks\CEF\CEFConfig::__construct()

CEFConfig constructor.



* Visibility: **public**




### getKeyspace

    string deasilworks\CEF\CEFConfig::getKeyspace()





* Visibility: **public**




### setKeyspace

    \deasilworks\CEF\CEFConfig deasilworks\CEF\CEFConfig::setKeyspace(string $keyspace)





* Visibility: **public**


#### Arguments
* $keyspace **string**



### getUsername

    string deasilworks\CEF\CEFConfig::getUsername()





* Visibility: **public**




### setUsername

    \deasilworks\CEF\CEFConfig deasilworks\CEF\CEFConfig::setUsername(string $username)





* Visibility: **public**


#### Arguments
* $username **string**



### getPassword

    string deasilworks\CEF\CEFConfig::getPassword()





* Visibility: **public**




### setPassword

    \deasilworks\CEF\CEFConfig deasilworks\CEF\CEFConfig::setPassword(string $password)





* Visibility: **public**


#### Arguments
* $password **string**



### getContactPoints

    array deasilworks\CEF\CEFConfig::getContactPoints()





* Visibility: **public**




### setContactPoints

    \deasilworks\CEF\CEFConfig deasilworks\CEF\CEFConfig::setContactPoints(array $contactPoints)





* Visibility: **public**


#### Arguments
* $contactPoints **array**



### getCluster

    \Cassandra\Cluster deasilworks\CEF\CEFConfig::getCluster()





* Visibility: **public**




## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.