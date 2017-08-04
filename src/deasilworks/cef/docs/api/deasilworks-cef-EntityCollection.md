deasilworks\CEF\EntityCollection
===============

Class EntityCollection.




* Class name: EntityCollection
* Namespace: deasilworks\CEF
* Parent class: [deasilworks\CEF\CEFData](deasilworks-CEF-CEFData.md)
* This class implements: Iterator




Properties
----------


### $valueClass

    protected string $valueClass = \deasilworks\CEF\EntityModel::class

Class name of values.



* Visibility: **protected**


### $serializeNull

    private boolean $serializeNull = false





* Visibility: **private**


### $collection

    protected array $collection = array()





* Visibility: **protected**


### $count

    private integer $count





* Visibility: **private**


### $position

    private integer $position





* Visibility: **private**


Methods
-------


### __construct

    mixed deasilworks\CEF\EntityCollection::__construct()

EntityCollection constructor.



* Visibility: **public**




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




### isEmpty

    boolean deasilworks\CEF\EntityCollection::isEmpty()





* Visibility: **public**




### getCount

    integer deasilworks\CEF\EntityCollection::getCount()





* Visibility: **public**




### setCount

    \deasilworks\CEF\EntityCollection deasilworks\CEF\EntityCollection::setCount(integer $count)





* Visibility: **public**


#### Arguments
* $count **integer**



### getModel

    mixed deasilworks\CEF\EntityCollection::getModel()

Model Factory.



* Visibility: **public**




### getModelClass

    string deasilworks\CEF\EntityCollection::getModelClass()





* Visibility: **public**




### getValueClass

    string deasilworks\CEF\EntityCollection::getValueClass()





* Visibility: **public**




### setModelClass

    \deasilworks\CEF\EntityCollection deasilworks\CEF\EntityCollection::setModelClass(string $valueClass)





* Visibility: **public**


#### Arguments
* $valueClass **string**



### getCollection

    array deasilworks\CEF\EntityCollection::getCollection()





* Visibility: **public**




### setCollection

    \deasilworks\CEF\EntityCollection deasilworks\CEF\EntityCollection::setCollection(array $collection)

Creates all entities from an array at once.

These are an array of entries that need to be converted to models.

* Visibility: **public**


#### Arguments
* $collection **array**



### addEntity

    \deasilworks\CEF\EntityCollection deasilworks\CEF\EntityCollection::addEntity(array $entity)

Adds a single entity.



* Visibility: **public**


#### Arguments
* $entity **array**



### rewind

    mixed deasilworks\CEF\EntityCollection::rewind()

Iterator rewind.



* Visibility: **public**




### current

    mixed deasilworks\CEF\EntityCollection::current()

Iterator current.



* Visibility: **public**




### key

    integer deasilworks\CEF\EntityCollection::key()

Iterator key.



* Visibility: **public**




### next

    mixed deasilworks\CEF\EntityCollection::next()

Iterator next.



* Visibility: **public**




### valid

    boolean deasilworks\CEF\EntityCollection::valid()

Iterator valid.



* Visibility: **public**




### __toString

    string deasilworks\CEF\CEFData::__toString()





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