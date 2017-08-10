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

use DI\ContainerBuilder;
use Doctrine\Common\Annotations\AnnotationRegistry as AR;

AR::registerLoader('class_exists');

/**
 * Class CEF.
 *
 * Responsible for managing configuration and
 * providing an EntityManager factory.
 */
class CEF
{
    /**
     * @var CEFConfig
     */
    private $config;

    /**
     * @var \DI\Container
     */
    private $container;

    /**
     * CEF constructor.
     *
     * @param $config
     */
    public function __construct(CEFConfig $config)
    {
        $this->config = $config;

        $builder = new ContainerBuilder();
        $this->container = $builder->build();

        $this->container->set(CEFConfig::class, $config);
    }

    /**
     * @return CEFConfig
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param CEFConfig $config
     *
     * @return CEF
     */
    public function setConfig($config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * @param string $mgrClass
     *
     * @throws \Exception
     *
     * @return EntityDataManager
     */
    public function getManager($mgrClass)
    {
        return $this->classGetter($mgrClass, [EntityDataManager::class, DomainEntityManager::class]);
    }

    /**
     * @param string $dataMgrClass
     *
     * @throws \Exception
     *
     * @return EntityDataManager
     */
    public function getDataManager($dataMgrClass)
    {
        return $this->classGetter($dataMgrClass, [EntityDataManager::class]);
    }

    /**
     * @param string $domainMgrClass
     *
     * @throws \Exception
     *
     * @return DomainEntityManager
     */
    public function getDomainManager($domainMgrClass)
    {
        return $this->classGetter($domainMgrClass, [DomainEntityManager::class]);
    }

    /**
     * @param string $domainModelClass
     *
     * @throws \Exception
     *
     * @return DomainEntityManager
     */
    public function getDomainModel($domainModelClass)
    {
        return $this->classGetter($domainModelClass, [DomainEntityManager::class]);
    }

    /**
     * @param string $className
     *
     * @param array $types
     *
     * @return mixed
     */
    private function classGetter($className, $types)
    {
        if (!class_exists($className)) {
            return null;
        }

        $obj = $this->container->get($className);

        foreach ($types as $type) {
            if ($obj instanceof $type) {
                return $obj;
            }
        }

        return null;
    }
}
