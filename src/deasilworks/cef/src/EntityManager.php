<?php

/*
 * MIT License
 *
 * Copyright (c) 2017 Deasil Works, Inc
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace deasilworks\cef;

use deasilworks\cef\Statement\Simple;

/**
 * Class EntityManager.
 *
 * Base class for entity managers.
 * Responsible for implementing methods to retrieve entities and
 * provides a Statement Manager factory to help accomplish that.
 */
abstract class EntityManager
{
    /**
     * A ResultContainer class.
     *
     * @var string
     */
    protected $collectionClass = ResultContainer::class;

    /**
     * @var CEFConfig
     */
    private $config;

    /**
     * EntityManager constructor.
     *
     * CEFConfig is required for getStatementManager to
     * produce Statement Managers.
     *
     * @param CEFConfig $config
     */
    public function __construct(CEFConfig $config)
    {
        $this->config = $config;
    }

    /**
     * Collection Factory.
     *
     * @return ResultContainer
     */
    public function getCollection()
    {
        $collectionClass = $this->getCollectionClass();

        return new $collectionClass($this);
    }

    /**
     * Get the model associated with the collection.
     *
     * @return EntityModel
     */
    public function getModel()
    {
        $collection = $this->getCollection();

        /** @var EntityModel $model */
        $model = $collection->getModel();
        $model->setEntityManager($this);

        return $model;
    }

    /**
     * @param string $collectionClass
     *
     * @return EntityManager
     */
    public function setCollectionClass($collectionClass)
    {
        $this->collectionClass = $collectionClass;

        return $this;
    }

    /**
     * @return string
     */
    public function getCollectionClass()
    {
        return $this->collectionClass;
    }

    /**
     * Statement Manager Factory.
     *
     * @param string $statementClass
     *
     * @throws \Exception
     *
     * @return StatementManager
     */
    public function getStatementManager($statementClass = Simple::class)
    {
        /** @var StatementManager $statementManager */
        $statementManager = new $statementClass($this->config, $this);

        $collectionClass = $this->getCollectionClass();

        if (!$statementManager instanceof StatementManager) {
            throw new \Exception($statementClass.' is not an instance of Deasil\CEF\StatementManager.');
        }

        $statementManager->setResultContainerClass($collectionClass);

        return $statementManager;
    }
}
