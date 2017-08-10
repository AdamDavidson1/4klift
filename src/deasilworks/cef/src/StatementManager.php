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
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace deasilworks\CEF;

use deasilworks\CEF\Cassandra\Transformer;
use deasilworks\CEF\StatementBuilder\Select;

/**
 * Class StatementManager.
 *
 * Responsible for executing CQL statements and providing a
 * StatementBuilder factory.
 */
class StatementManager
{
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
     * @var CEFConfig
     */
    protected $config;

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
     * @var EntityDataManager;
     */
    protected $entityManager;

    /**
     * @var string
     */
    protected $transformerClass = Transformer::class;

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
    protected $resultModelClass = EntityDataModel::class;

    /**
     * StatementManager constructor.
     *
     * @param CEFConfig         $config
     * @param EntityDataManager $entityManager
     */
    public function __construct(CEFConfig $config, EntityDataManager $entityManager)
    {
        $this->config = $config;
        $this->entityManager = $entityManager;
    }

    /**
     * @return string
     */
    public function getTransformerClass()
    {
        return $this->transformerClass;
    }

    /**
     * @param string $transformerClass
     *
     * @return StatementManager
     */
    public function setTransformerClass($transformerClass)
    {
        $this->transformerClass = $transformerClass;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransformer()
    {
        return new $this->transformerClass();
    }

    /**
     * @return EntityDataManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param EntityDataManager $entityManager
     *
     * @return StatementManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCluster()
    {
        if (!$this->cluster) {
            $this->cluster = $this->config->getCluster();
        }

        return $this->cluster;
    }

    /**
     * @return \Cassandra\Session
     */
    public function getSession()
    {
        $cluster = $this->getCluster();

        if (!$this->session) {
            $this->session = $cluster->connect($this->config->getKeyspace());
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
     *
     * @return mixed
     */
    private function executeStatement($type = 'execute')
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

        return $result;
    }

    /**
     * @return ResultContainer
     */
    public function execute()
    {
        $result = $this->executeStatement();

        $resultContainer = $this->getResultContainer();

        // convert result to entity collection
        if ($result && $result instanceof \Cassandra\Rows) {
            $transformer = $this->getTransformer();
            $resultContainer->setResults($transformer->transformRows($result));

            return $resultContainer;
        }

        return $resultContainer;
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
        $resultContainer = new $resultClass($this->entityManager);

        // set the model class
        $this->setResultModelClass($resultContainer->getModelClass());

        return $this;
    }

    /**
     * Result Container Factory.
     *
     * @return ResultContainer
     */
    private function getResultContainer()
    {
        $rcClass = $this->getResultContainerClass();

        /** @var ResultContainer $resultContainer */
        $resultContainer = new $rcClass($this->entityManager);

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
     * @return EntityDataModel
     */
    public function getResultModel()
    {
        $rmClass = $this->getResultModelClass();

        // @SOMEDAY: thow exception if this fails / check for EntityModel

        /** @var EntityDataModel $rc */
        $resultModel = new $rmClass();

        return $resultModel;
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
     * @param array $previousArgs
     */
    private function previousArgs(array $previousArgs)
    {
        $this->previousArguments = $previousArgs;
    }
}
