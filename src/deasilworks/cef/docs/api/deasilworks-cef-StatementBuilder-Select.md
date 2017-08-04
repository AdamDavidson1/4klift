deasilworks\CEF\StatementBuilder\Select
===============

Class Select.




* Class name: Select
* Namespace: deasilworks\CEF\StatementBuilder
* Parent class: [deasilworks\CEF\StatementBuilder](deasilworks-CEF-StatementBuilder.md)



Constants
----------


### SELECT_TYPE

    const SELECT_TYPE = 'SELECT'





### SELECT_JSON_TYPE

    const SELECT_JSON_TYPE = 'SELECT JSON'





Properties
----------


### $type

    protected string $type = 'SELECT JSON'





* Visibility: **protected**


### $columns

    protected array $columns = array()





* Visibility: **protected**


### $where

    protected array $where = array()





* Visibility: **protected**


### $from

    protected string $from





* Visibility: **protected**


Methods
-------


### __toString

    mixed deasilworks\CEF\StatementBuilder\Select::__toString()

To String.



* Visibility: **public**




### getStatement

    string deasilworks\CEF\StatementBuilder\Select::getStatement()





* Visibility: **public**




### getType

    string deasilworks\CEF\StatementBuilder\Select::getType()





* Visibility: **public**




### setType

    \deasilworks\CEF\StatementBuilder\Select deasilworks\CEF\StatementBuilder\Select::setType(string $type)





* Visibility: **public**


#### Arguments
* $type **string**



### getColumns

    array deasilworks\CEF\StatementBuilder\Select::getColumns()





* Visibility: **public**




### setColumns

    \deasilworks\CEF\StatementBuilder\Select deasilworks\CEF\StatementBuilder\Select::setColumns(array $columns)





* Visibility: **public**


#### Arguments
* $columns **array**



### getWhere

    string deasilworks\CEF\StatementBuilder\Select::getWhere()





* Visibility: **public**




### setWhere

    \deasilworks\CEF\StatementBuilder\Select deasilworks\CEF\StatementBuilder\Select::setWhere(array $where)





* Visibility: **public**


#### Arguments
* $where **array**



### getFrom

    string deasilworks\CEF\StatementBuilder::getFrom()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementBuilder](deasilworks-CEF-StatementBuilder.md)




### setFrom

    \deasilworks\CEF\StatementBuilder deasilworks\CEF\StatementBuilder::setFrom(string $from)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\StatementBuilder](deasilworks-CEF-StatementBuilder.md)


#### Arguments
* $from **string**



## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.