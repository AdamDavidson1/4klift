deasilworks\CEF\CEFData
===============

Class CEFData.




* Class name: CEFData
* Namespace: deasilworks\CEF
* This is an **abstract** class





Properties
----------


### $serializeNull

    private boolean $serializeNull = false





* Visibility: **private**


Methods
-------


### __toString

    string deasilworks\CEF\CEFData::__toString()





* Visibility: **public**




### isSerializeNull

    boolean deasilworks\CEF\CEFData::isSerializeNull()





* Visibility: **public**




### setSerializeNull

    \deasilworks\CEF\CEFData deasilworks\CEF\CEFData::setSerializeNull(boolean $serializeNull)





* Visibility: **public**


#### Arguments
* $serializeNull **boolean**



### toJson

    string deasilworks\CEF\CEFData::toJson()

To JSON.



* Visibility: **public**




### serialize

    mixed|string deasilworks\CEF\CEFData::serialize($obj, string $type)

Serialize.



* Visibility: **protected**


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


#### Arguments
* $name **mixed**
* $value **mixed**



### hydrate

    boolean deasilworks\CEF\CEFData::hydrate($context, $name, $value)

Hydrate.



* Visibility: **private**


#### Arguments
* $context **mixed**
* $name **mixed**
* $value **mixed**



### hydrateEntityCollection

    mixed deasilworks\CEF\CEFData::hydrateEntityCollection(\deasilworks\CEF\EntityCollection $obj, $value)





* Visibility: **private**


#### Arguments
* $obj **[deasilworks\CEF\EntityCollection](deasilworks-CEF-EntityCollection.md)**
* $value **mixed**



### hydrateClassObject

    mixed deasilworks\CEF\CEFData::hydrateClassObject($obj, $data)

Hydrate class object.



* Visibility: **private**


#### Arguments
* $obj **mixed**
* $data **mixed**



## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.