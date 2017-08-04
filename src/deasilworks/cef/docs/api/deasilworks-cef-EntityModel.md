deasilworks\cef\EntityModel
===============

Class EntityModel.

This is the generic entity model and allows the setting of arbitrary properties.


* Class name: EntityModel
* Namespace: deasilworks\cef
* Parent class: [deasilworks\cef\CEFData](deasilworks-cef-CEFData.md)





Properties
----------


### $tableName

    protected string $tableName





* Visibility: **protected**


### $entityManager

    protected \deasilworks\cef\EntityManager $entityManager





* Visibility: **protected**


### $serializeNull

    private boolean $serializeNull = false





* Visibility: **private**


Methods
-------


### getTableName

    string deasilworks\cef\EntityModel::getTableName()





* Visibility: **public**




### setTableName

    \deasilworks\cef\EntityModel deasilworks\cef\EntityModel::setTableName(string $tableName)





* Visibility: **public**


#### Arguments
* $tableName **string**



### getEntityManager

    \deasilworks\cef\EntityManager deasilworks\cef\EntityModel::getEntityManager()





* Visibility: **public**




### setEntityManager

    \deasilworks\cef\EntityModel deasilworks\cef\EntityModel::setEntityManager(\deasilworks\cef\EntityManager $entityManager)





* Visibility: **public**


#### Arguments
* $entityManager **[deasilworks\cef\EntityManager](deasilworks-cef-EntityManager.md)**



### save

    \deasilworks\cef\EntityCollection deasilworks\cef\EntityModel::save()

Saves a model to the database.



* Visibility: **public**




### __toString

    string deasilworks\cef\CEFData::__toString()





* Visibility: **public**
* This method is defined by [deasilworks\cef\CEFData](deasilworks-cef-CEFData.md)




### isSerializeNull

    boolean deasilworks\cef\CEFData::isSerializeNull()





* Visibility: **public**
* This method is defined by [deasilworks\cef\CEFData](deasilworks-cef-CEFData.md)




### setSerializeNull

    \deasilworks\cef\CEFData deasilworks\cef\CEFData::setSerializeNull(boolean $serializeNull)





* Visibility: **public**
* This method is defined by [deasilworks\cef\CEFData](deasilworks-cef-CEFData.md)


#### Arguments
* $serializeNull **boolean**



### toJson

    string deasilworks\cef\CEFData::toJson()

To JSON.



* Visibility: **public**
* This method is defined by [deasilworks\cef\CEFData](deasilworks-cef-CEFData.md)




### serialize

    mixed|string deasilworks\cef\CEFData::serialize($obj, string $type)

Serialize.



* Visibility: **protected**
* This method is defined by [deasilworks\cef\CEFData](deasilworks-cef-CEFData.md)


#### Arguments
* $obj **mixed**
* $type **string**



### __set

    mixed deasilworks\cef\CEFData::__set($name, $value)

Handle attribute sets.

Setting properties on the generic EntityModel
used for collections without defined models and
REQUIRED for hydration of entities with defined models.

* Visibility: **public**
* This method is defined by [deasilworks\cef\CEFData](deasilworks-cef-CEFData.md)


#### Arguments
* $name **mixed**
* $value **mixed**



### hydrate

    boolean deasilworks\cef\CEFData::hydrate($context, $name, $value)

Hydrate.



* Visibility: **private**
* This method is defined by [deasilworks\cef\CEFData](deasilworks-cef-CEFData.md)


#### Arguments
* $context **mixed**
* $name **mixed**
* $value **mixed**



### hydrateEntityCollection

    mixed deasilworks\cef\CEFData::hydrateEntityCollection(\deasilworks\cef\EntityCollection $obj, $value)





* Visibility: **private**
* This method is defined by [deasilworks\cef\CEFData](deasilworks-cef-CEFData.md)


#### Arguments
* $obj **[deasilworks\cef\EntityCollection](deasilworks-cef-EntityCollection.md)**
* $value **mixed**



### hydrateClassObject

    mixed deasilworks\cef\CEFData::hydrateClassObject($obj, $data)

Hydrate class object.



* Visibility: **private**
* This method is defined by [deasilworks\cef\CEFData](deasilworks-cef-CEFData.md)


#### Arguments
* $obj **mixed**
* $data **mixed**



## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.