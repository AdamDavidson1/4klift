<?php

namespace deasilworks\cef\test\Manager;

use deasilworks\cef\EntityManager;
use deasilworks\cef\test\Collection\LocalCollection;

class LocalManager extends EntityManager
{
    /**
     * A ResultContainer class
     *
     * @var string $collectionClass
     */
    protected $collectionClass = LocalCollection::class;

}
