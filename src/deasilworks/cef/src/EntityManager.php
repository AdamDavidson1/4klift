<?php

/*
 * This file is part of cef (a 4klift component).
 *
 * Copyright (c) 2017 Deasil Works Inc.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is furnished
 * to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace deasilworks\cef;

use deasilworks\cef\Statement\Simple;
use Pimple\Container;

/**
 * Class EntityManager.
 */
abstract class EntityManager
{
    /**
     * @var Container
     */
    protected $app;

    /**f
     * A ResultContainer class
     *
     * @var string $collectionClass
     */
    protected $collectionClass = ResultContainer::class;

    /**
     * @var
     */
    protected $config;

    /**
     * @return Container
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @param Container $app
     *
     * @return EntityManager
     */
    public function setApp($app)
    {
        $this->app = $app;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        if (!$this->config) {
            $this->config = $this->getApp()['config']->get('cassandra');
        }

        return $this->config;
    }

    /**
     * @param array $config
     *
     * @return EntityManager
     */
    public function setConfig($config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Get's the model associated witht the collection.
     *
     * @return EntityModel
     */
    public function getModel()
    {
        if (!$this->collectionClass) {
            return new EntityModel();
        }

        $collection = $this->getCollection();

        /** @var EntityModel $model */
        $model = $collection->getModel();
        $model->setEntityManager($this);

        return $model;
    }

    /**
     * Collection Factory.
     *
     * @throws \Exception
     *
     * @return \DeasilWorks\CEF\ResultContainer
     */
    public function getCollection()
    {
        $collectionClass = $this->getCollectionClass();
        $collection = new $collectionClass();

        if (!($collection instanceof ResultContainer)) {
            throw new \Exception('E5000', $collectionClass.' is not an instance of deasilworks\CEF\StatementManager.');
        }

        return $collection;
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
        $statementManager = new $statementClass();

        $collectionClass = $this->getCollectionClass();

        if (!($statementManager instanceof StatementManager)) {
            throw new \Exception($statementClass.' is not an instance of deasilworks\CEF\StatementManager.');
        }

        $statementManager->setApp($this->getApp());
        $statementManager->setConfig($this->getConfig());
        $statementManager->setResultContainerClass($collectionClass);
        $statementManager->setEntityManager($this);

        return $statementManager;
    }
}
