deasilworks\cef\CEFConfig
===============

Class CEFConfig.




* Class name: CEFConfig
* Namespace: deasilworks\cef





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

    mixed deasilworks\cef\CEFConfig::__construct()

CEFConfig constructor.



* Visibility: **public**




### getKeyspace

    string deasilworks\cef\CEFConfig::getKeyspace()





* Visibility: **public**




### setKeyspace

    \deasilworks\cef\CEFConfig deasilworks\cef\CEFConfig::setKeyspace(string $keyspace)





* Visibility: **public**


#### Arguments
* $keyspace **string**



### getUsername

    string deasilworks\cef\CEFConfig::getUsername()





* Visibility: **public**




### setUsername

    \deasilworks\cef\CEFConfig deasilworks\cef\CEFConfig::setUsername(string $username)





* Visibility: **public**


#### Arguments
* $username **string**



### getPassword

    string deasilworks\cef\CEFConfig::getPassword()





* Visibility: **public**




### setPassword

    \deasilworks\cef\CEFConfig deasilworks\cef\CEFConfig::setPassword(string $password)





* Visibility: **public**


#### Arguments
* $password **string**



### getContactPoints

    array deasilworks\cef\CEFConfig::getContactPoints()





* Visibility: **public**




### setContactPoints

    \deasilworks\cef\CEFConfig deasilworks\cef\CEFConfig::setContactPoints(array $contactPoints)





* Visibility: **public**


#### Arguments
* $contactPoints **array**



### getCluster

    \Cassandra\Cluster deasilworks\cef\CEFConfig::getCluster()





* Visibility: **public**




## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.