deasilworks\CEF\Cassandra\Transformer
===============

Class Transformer.

Responsible for transforming data returned by Cassandra
into a hash data structure suitable for later marshalling to
a CEF EntityModel.


* Class name: Transformer
* Namespace: deasilworks\CEF\Cassandra







Methods
-------


### transformRows

    array deasilworks\CEF\Cassandra\Transformer::transformRows(\Cassandra\Rows $rows)

Transform Cassandra Rows.



* Visibility: **public**


#### Arguments
* $rows **Cassandra\Rows**



### handleTimestamp

    mixed deasilworks\CEF\Cassandra\Transformer::handleTimestamp(\Cassandra\Timestamp $timestamp)





* Visibility: **protected**


#### Arguments
* $timestamp **Cassandra\Timestamp**



### transform

    mixed deasilworks\CEF\Cassandra\Transformer::transform($row)





* Visibility: **protected**


#### Arguments
* $row **mixed**



## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.