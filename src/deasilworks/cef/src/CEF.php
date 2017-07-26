<?php

/**
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
 *
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

namespace deasilworks\cef;

use Doctrine\Common\Annotations\AnnotationRegistry as AR;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

AR::registerLoader('class_exists');

/**
 * Class cef.
 */
class CEF implements ServiceProviderInterface
{
    /**
     * @var Container
     */
    private $app;

    /**
     * Registers services on the given container.
     *
     * @param Container $app A container instance
     */
    public function register(Container $app)
    {
        $this->setApp($app);
        $app['cef'] = $this;
    }

    /**
     * Load a Cassandra Entity Manager.
     *
     * @deprecated use getEntityManager
     *
     * @param $name
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function load($name)
    {
        $this->$name = new $name();

        if (!($this->$name instanceof EntityManager)) {
            throw new \Exception($name.' is not an instance of deasilworks\cef\EntityManager.');
        }

        $this->$name->setApp($this->getApp());

        return $this->$name;
    }

    /**
     * @param string $managerClass
     *
     * @throws \Exception
     *
     * @return EntityManager
     */
    public function getEntityManager($managerClass)
    {
        $manager = new $managerClass();

        if ($manager instanceof EntityManager) {
            throw new \Exception($managerClass.' is not an instance of deasilworks\CEF\EntityManager.');
        }

        $manager->setApp($this->getApp());

        return $manager;
    }

    /**
     * Handel setting properties on the cef service.
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

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
     * @return CEF
     */
    public function setApp($app)
    {
        $this->app = $app;

        return $this;
    }
}
