deasilworks\cef\StatementBuilder\Select
===============

Class Select.




* Class name: Select
* Namespace: deasilworks\cef\StatementBuilder
* Parent class: [deasilworks\cef\StatementBuilder](deasilworks-cef-StatementBuilder.md)



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

    mixed deasilworks\cef\StatementBuilder\Select::__toString()

To String.



* Visibility: **public**




### getStatement

    string deasilworks\cef\StatementBuilder\Select::getStatement()





* Visibility: **public**




### getType

    string deasilworks\cef\StatementBuilder\Select::getType()





* Visibility: **public**




### setType

    \deasilworks\cef\StatementBuilder\Select deasilworks\cef\StatementBuilder\Select::setType(string $type)





* Visibility: **public**


#### Arguments
* $type **string**



### getColumns

    array deasilworks\cef\StatementBuilder\Select::getColumns()





* Visibility: **public**




### setColumns

    \deasilworks\cef\StatementBuilder\Select deasilworks\cef\StatementBuilder\Select::setColumns(array $columns)





* Visibility: **public**


#### Arguments
* $columns **array**



### getWhere

    string deasilworks\cef\StatementBuilder\Select::getWhere()





* Visibility: **public**




### setWhere

    \deasilworks\cef\StatementBuilder\Select deasilworks\cef\StatementBuilder\Select::setWhere(array $where)





* Visibility: **public**


#### Arguments
* $where **array**



### getFrom

    string deasilworks\cef\StatementBuilder::getFrom()





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementBuilder](deasilworks-cef-StatementBuilder.md)




### setFrom

    \deasilworks\cef\StatementBuilder deasilworks\cef\StatementBuilder::setFrom(string $from)





* Visibility: **public**
* This method is defined by [deasilworks\cef\StatementBuilder](deasilworks-cef-StatementBuilder.md)


#### Arguments
* $from **string**



## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.