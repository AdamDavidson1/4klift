deasilworks\CEF\EntityModel
===============

Class EntityModel.

This is the generic entity model and allows the setting of arbitrary properties.


* Class name: EntityModel
* Namespace: deasilworks\CEF
* Parent class: [deasilworks\CEF\CEFData](deasilworks-CEF-CEFData.md)





Properties
----------


### $tableName

    protected string $tableName





* Visibility: **protected**


### $entityManager

    protected \deasilworks\CEF\EntityManager $entityManager





* Visibility: **protected**


### $serializeNull

    private boolean $serializeNull = false





* Visibility: **private**


Methods
-------


### getTableName

    string deasilworks\CEF\EntityModel::getTableName()





* Visibility: **public**




### setTableName

    \deasilworks\CEF\EntityModel deasilworks\CEF\EntityModel::setTableName(string $tableName)





* Visibility: **public**


#### Arguments
* $tableName **string**



### getEntityManager

    \deasilworks\CEF\EntityManager deasilworks\CEF\EntityModel::getEntityManager()





* Visibility: **public**




### setEntityManager

    \deasilworks\CEF\EntityModel deasilworks\CEF\EntityModel::setEntityManager(\deasilworks\CEF\EntityManager $entityManager)





* Visibility: **public**


#### Arguments
* $entityManager **[deasilworks\CEF\EntityManager](deasilworks-CEF-EntityManager.md)**



### save

    \deasilworks\CEF\EntityCollection deasilworks\CEF\EntityModel::save()

Saves a model to the database.



* Visibility: **public**




### __toString

    string deasilworks\CEF\CEFData::__toString()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\CEFData](deasilworks-CEF-CEFData.md)




### isSerializeNull

    boolean deasilworks\CEF\CEFData::isSerializeNull()





* Visibility: **public**
* This method is defined by [deasilworks\CEF\CEFData](deasilworks-CEF-CEFData.md)




### setSerializeNull

    \deasilworks\CEF\CEFData deasilworks\CEF\CEFData::setSerializeNull(boolean $serializeNull)





* Visibility: **public**
* This method is defined by [deasilworks\CEF\CEFData](deasilworks-CEF-CEFData.md)


#### Arguments
* $serializeNull **boolean**



### toJson

    string deasilworks\CEF\CEFData::toJson()

To JSON.



* Visibility: **public**
* This method is defined by [deasilworks\CEF\CEFData](deasilworks-CEF-CEFData.md)




### serialize

    mixed|string deasilworks\CEF\CEFData::serialize($obj, string $type)

Serialize.



* Visibility: **protected**
* This method is defined by [deasilworks\CEF\CEFData](deasilworks-CEF-CEFData.md)


#### Arguments
* $obj **mixed**
* $type **string**



### __set

    mixed deasilworks\CEF\CEFData::__set($name, $value)

Handle attribute sets.

Setting properties on the generic EntityModel
used for collections without defined models and
REQUIRED for hydration of entities with defined models.

* Visibility: **public**
* This method is defined by [deasilworks\CEF\CEFData](deasilworks-CEF-CEFData.md)


#### Arguments
* $name **mixed**
* $value **mixed**



### hydrate

    boolean deasilworks\CEF\CEFData::hydrate($context, $name, $value)

Hydrate.



* Visibility: **private**
* This method is defined by [deasilworks\CEF\CEFData](deasilworks-CEF-CEFData.md)


#### Arguments
* $context **mixed**
* $name **mixed**
* $value **mixed**



### hydrateEntityCollection

    mixed deasilworks\CEF\CEFData::hydrateEntityCollection(\deasilworks\CEF\EntityCollection $obj, $value)





* Visibility: **private**
* This method is defined by [deasilworks\CEF\CEFData](deasilworks-CEF-CEFData.md)


#### Arguments
* $obj **[deasilworks\CEF\EntityCollection](deasilworks-CEF-EntityCollection.md)**
* $value **mixed**



### hydrateClassObject

    mixed deasilworks\CEF\CEFData::hydrateClassObject($obj, $data)

Hydrate class object.



* Visibility: **private**
* This method is defined by [deasilworks\CEF\CEFData](deasilworks-CEF-CEFData.md)


#### Arguments
* $obj **mixed**
* $data **mixed**



## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.