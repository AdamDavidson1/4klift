deasilworks\cef\EntityCollection
===============

Class EntityCollection.




* Class name: EntityCollection
* Namespace: deasilworks\cef
* Parent class: [deasilworks\cef\CEFData](deasilworks-cef-CEFData.md)
* This class implements: Iterator




Properties
----------


### $valueClass

    protected string $valueClass = \deasilworks\cef\EntityModel::class

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

    mixed deasilworks\cef\EntityCollection::__construct()

EntityCollection constructor.



* Visibility: **public**




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




### isEmpty

    boolean deasilworks\cef\EntityCollection::isEmpty()





* Visibility: **public**




### getCount

    integer deasilworks\cef\EntityCollection::getCount()





* Visibility: **public**




### setCount

    \deasilworks\cef\EntityCollection deasilworks\cef\EntityCollection::setCount(integer $count)





* Visibility: **public**


#### Arguments
* $count **integer**



### getModel

    mixed deasilworks\cef\EntityCollection::getModel()

Model Factory.



* Visibility: **public**




### getModelClass

    string deasilworks\cef\EntityCollection::getModelClass()





* Visibility: **public**




### getValueClass

    string deasilworks\cef\EntityCollection::getValueClass()





* Visibility: **public**




### setModelClass

    \deasilworks\cef\EntityCollection deasilworks\cef\EntityCollection::setModelClass(string $valueClass)





* Visibility: **public**


#### Arguments
* $valueClass **string**



### getCollection

    array deasilworks\cef\EntityCollection::getCollection()





* Visibility: **public**




### setCollection

    \deasilworks\cef\EntityCollection deasilworks\cef\EntityCollection::setCollection(array $collection)

Creates all entities from an array at once.

These are an array of entries that need to be converted to models.

* Visibility: **public**


#### Arguments
* $collection **array**



### addEntity

    \deasilworks\cef\EntityCollection deasilworks\cef\EntityCollection::addEntity(array $entity)

Adds a single entity.



* Visibility: **public**


#### Arguments
* $entity **array**



### rewind

    mixed deasilworks\cef\EntityCollection::rewind()

Iterator rewind.



* Visibility: **public**




### current

    mixed deasilworks\cef\EntityCollection::current()

Iterator current.



* Visibility: **public**




### key

    integer deasilworks\cef\EntityCollection::key()

Iterator key.



* Visibility: **public**




### next

    mixed deasilworks\cef\EntityCollection::next()

Iterator next.



* Visibility: **public**




### valid

    boolean deasilworks\cef\EntityCollection::valid()

Iterator valid.



* Visibility: **public**




### __toString

    string deasilworks\cef\CEFData::__toString()





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