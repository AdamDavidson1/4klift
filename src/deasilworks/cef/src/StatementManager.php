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

use Cassandra\Cluster\Builder;
use deasilworks\cef\StatementBuilder\Select;
use Pimple\Container;

/**
 * Class StatementManager.
 */
abstract class StatementManager
{
    /**
     * @var array
     */
    private $jsonKeys = [
        'comm_rx',
        'comm_tx',
    ];

    /**
     * A day in seconds.
     */
    const DAY = 86400;

    /**
     * @var \Cassandra\Session
     */
    protected $session;

    /**
     * @var \Cassandra\Cluster\Builder
     */
    protected $cluster;

    /**
     * @var \Cassandra\Statement
     */
    protected $statement;

    /**
     * @var StatementBuilder
     */
    protected $statementBuilder;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var Container
     */
    protected $app;

    /**
     * @var mixed
     */
    protected $consistency;

    /**
     * @var mixed
     */
    protected $retryPolicy;

    /**
     * @var array
     */
    protected $arguments;

    /**
     * @var array
     */
    protected $previousArguments;

    /**
     * @var EntityManager;
     */
    protected $entityManager;

    /**
     * ResultContainer class.
     *
     * @var string
     */
    protected $resultClass = ResultContainer::class;

    /**
     * EntityModel class.
     *
     * @var string
     */
    protected $resultModelClass = EntityModel::class;

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
     * @return StatementManager
     */
    public function setApp($app)
    {
        $this->app = $app;

        return $this;
    }

    /**
     * @param array $config
     *
     * @return StatementManager
     */
    public function setConfig($config)
    {
        $this->config = $config;

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
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param EntityManager $entityManager
     *
     * @return StatementManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;

        return $this;
    }

    /**
     * @return Builder
     */
    public function getCassandraCluster()
    {
        return \Cassandra::cluster();
    }

    /**
     * @return mixed
     */
    public function getCluster()
    {
        $config = $this->getConfig();

        if (!$this->cluster) {
            $retryPolicy = new \Cassandra\RetryPolicy\DowngradingConsistency();
            $loggedRetry = new \Cassandra\RetryPolicy\Logging($retryPolicy);

            /** @var \Cassandra\Cluster\Builder $cluster */
            $cluster = $this->getCassandraCluster();
            $cluster
                ->withDefaultConsistency(\Cassandra::CONSISTENCY_LOCAL_QUORUM)
                ->withRetryPolicy($loggedRetry)
                ->withTokenAwareRouting(true);

            if (array_key_exists('username', $config) && array_key_exists('password', $config)) {
                $cluster->withCredentials($config['username'], $config['password']);
            }

            if (array_key_exists('withContactPoints', $config)) {
                call_user_func_array([$cluster, 'withContactPoints'], $config['contact_points']);
            }

            $this->cluster = $cluster->build();
        }

        return $this->cluster;
    }

    /**
     * @return \Cassandra\Session
     */
    public function getSession()
    {
        $config = $this->getConfig();
        $cluster = $this->getCluster();

        if (!$this->session) {
            $this->session = $cluster->connect($config['keyspace']);
        }

        return $this->session;
    }

    /**
     * @return mixed
     */
    public function getConsistency()
    {
        return $this->consistency;
    }

    /**
     * @param mixed|null $consistency
     *
     * @return $this
     */
    public function setConsistency($consistency = null)
    {
        $this->consistency = $consistency;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRetryPolicy()
    {
        return $this->retryPolicy;
    }

    /**
     * @param mixed|null $retryPolicy
     *
     * @return $this
     */
    public function setRetryPolicy($retryPolicy = null)
    {
        $this->retryPolicy = $retryPolicy;

        return $this;
    }

    /**
     * @param null|array $arguments
     *
     * @return $this
     */
    public function setArguments($arguments = null)
    {
        $this->arguments = $arguments;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @return \DeasilWorks\CEF\StatementBuilder
     */
    public function getSb()
    {
        return $this->statementBuilder;
    }

    /**
     * @param \DeasilWorks\CEF\StatementBuilder $statementBuilder
     *
     * @return $this
     */
    public function setSb($statementBuilder)
    {
        $this->statementBuilder = $statementBuilder;

        return $this;
    }

    /**
     * @param string|StatementBuilder $simpleStatement
     *
     * @return $this
     */
    public function setStatement($simpleStatement)
    {
        if (is_object($simpleStatement) && $simpleStatement instanceof StatementBuilder) {
            $this->setSb($simpleStatement);
        }

        $this->statement = $simpleStatement;

        return $this;
    }

    /**
     * @return \Cassandra\Statement
     */
    public function getStatement()
    {
        return $this->statement;
    }

    /**
     * @return $this
     */
    public function reset()
    {
        if ($this->getArguments()) {
            $this->previousArgs($this->getArguments());
        }

        $this->setArguments();
        $this->setConsistency();
        $this->setRetryPolicy();

        $this->getSession();

        return $this;
    }

    /**
     * @param string $type
     * @param bool   $reset
     *
     * @return mixed
     */
    private function executeStatement($type = 'execute', $reset = true)
    {
        $options = [
            'consistency' => \Cassandra::CONSISTENCY_LOCAL_QUORUM,
        ];

        if ($this->getConsistency()) {
            $options['consistency'] = $this->getConsistency();
        }

        if ($this->getRetryPolicy()) {
            $options['retryPolicy'] = $this->getRetryPolicy();
        }

        if (is_array($this->getArguments())) {
            $options['arguments'] = $this->getArguments();
        }

        $casOptions = new \Cassandra\ExecutionOptions($options);
        $session = $this->getSession();

        // execute
        /** @var \Cassandra\Rows $result */
        $result = $session->$type($this->getStatement(), $casOptions);

        // deal with args
        if (array_key_exists('arguments', $options)) {
            $this->previousArgs($options['arguments']);
        }

        if ($reset) {
            $this->reset();
        }

        return $result;
    }

    /**
     * @return ResultContainer
     */
    public function execute()
    {
        $result = $this->executeStatement();

        $resultContainer = null;

        // convert result to entity collection
        if ($result && $result instanceof \Cassandra\Rows) {
            /** @var ResultContainer $resultContainer */
            $resultContainer = $this->rowsToEntityCollection($result);
        }

        return $resultContainer;
    }

    /**
     * @return \Cassandra\Future
     */
    public function executeAsync()
    {
        return $this->executeStatement('executeAsync');
    }

    /**
     * @return array
     */
    public function getJsonKeys()
    {
        return $this->jsonKeys;
    }

    /**
     * @param array $jsonKeys
     *
     * @return $this
     */
    public function setJsonKeys($jsonKeys)
    {
        $this->jsonKeys = $jsonKeys;

        return $this;
    }

    /**
     * @return string
     */
    public function getResultContainerClass()
    {
        return $this->resultClass;
    }

    /**
     * @param string $resultClass
     *
     * @return $this
     */
    public function setResultContainerClass($resultClass)
    {
        $this->resultClass = $resultClass;

        /** @var ResultContainer $resultContainer */
        $resultContainer = new $resultClass();

        // set the model class
        $this->setResultModelClass($resultContainer->getModelClass());

        return $this;
    }

    /**
     * @return ResultContainer
     */
    public function getResultContainer()
    {
        $rcClass = $this->getResultContainerClass();

        // @SOMEDAY: throw exception if this fails / check for ResultContainer

        /** @var ResultContainer $resultContainer */
        $resultContainer = new $rcClass();
        $resultContainer->setEntityManager($this->getEntityManager());

        return $resultContainer;
    }

    /**
     * @return string
     */
    public function getResultModelClass()
    {
        return $this->resultModelClass;
    }

    /**
     * @param string $resultModelClass
     *
     * @return $this
     */
    protected function setResultModelClass($resultModelClass)
    {
        $this->resultModelClass = $resultModelClass;

        return $this;
    }

    /**
     * @return EntityModel
     */
    public function getResultModel()
    {
        $rmClass = $this->getResultModelClass();

        // @SOMEDAY: thow exception if this fails / check for EntityModel

        /** @var EntityModel $rc */
        $resultModel = new $rmClass();

        return $resultModel;
    }

    /**
     * @param \Cassandra\Rows $rows
     *
     * @return EntityCollection
     */
    protected function rowsToEntityCollection($rows)
    {
        /** @var ResultContainer $resultContainer */
        $resultContainer = $this->getResultContainer();

        $resultContainer->setArguments($this->previousArguments);
        $resultContainer->setStatement((string) $this->getSb());

        $entries = [];

        // page through all results
        while (true) {
            while ($rows->valid()) {

                // marshall
                $entry = $this->normalize($rows->current());

                if ($entry) {
                    array_push($entries, $entry);
                }

                $rows->next();
            }

            if ($rows->isLastPage()) {
                break;
            }

            $rows = $rows->nextPage();
        }

        $resultContainer->setResults($entries);

        return $resultContainer;
    }

    /**
     * @param $builderClass
     *
     * @return \DeasilWorks\CEF\StatementBuilder
     */
    public function getStatementBuilder($builderClass = Select::class)
    {
        // @SOMEDAY check for instance of StatementBuilder

        /** @var StatementBuilder $statementBuilder */
        $statementBuilder = new $builderClass();
        $table = $this->getResultModel()->getTableName();

        $statementBuilder->setFrom($table);

        return $statementBuilder;
    }

    /**
     * @param $row
     *
     * @return mixed
     */
    protected function normalize($row)
    {
        // loop through the object keys and normalize
        $entry = [];

        if (is_object($row) && get_class($row) == 'Cassandra\\Map') {
            /** @var \Cassandra\Map $row */
            $keys = $row->keys();
            $data = [];
            foreach ($keys as $key) {
                $data[(string) $key] = $row->offsetGet($key);
            }
            $row = $data;
        }

        $handlerMap = [
            'Cassandra\\Timestamp' => function ($value) {
                return $this->handleTimestamp($value);
            },
            'Cassandra\\UserTypeValue' => function ($value) {
                return $this->normalize($value);
            },
            'Cassandra\\Map' => function ($value) {
                return $this->normalize($value);
            },
            'Cassandra\\Set' => function ($value) {
                return $this->normalize($value);
            },
        ];

        foreach ($row as $key => $value) {

            // if it's not an object just assign it
            if (!is_object($value)) {
                $entry[$key] = $value;

                continue;
            }

            // it's an object so let's get the class
            $class = get_class($value);

            // it this a Cassandra object?
            if (array_key_exists($class, $handlerMap)) {
                $entry[$key] = $handlerMap[$class];

                continue;
            }

            // it's an object but not a known cassandra object so let
            // the hydrator deal with it.

            $entry[$key] = $value;
        }

        return $entry;
    }

    /**
     * @param $class
     *
     * @return mixed
     */
    private function handleTimestamp($class)
    {
        /** @var \Cassandra\Timestamp $timestamp */
        $timestamp = $class;

        return $timestamp->time();
    }

    /**
     * @param array $previousArgs
     */
    private function previousArgs(array $previousArgs)
    {
        $this->previousArguments = $previousArgs;
    }
}
