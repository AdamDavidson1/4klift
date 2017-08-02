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

namespace deasilworks\cef\ServiceProvider\Silex;

use deasilworks\cef\CEF;
use deasilworks\cef\CEFConfig;
use deasilworks\cef\EntityModel;
use deasilworks\cfg\ServiceProvider\Silex\ServiceProvider;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class CEFServiceProvider.
 *
 * Responsible for providing CEF as a service to
 * the application built on the Silex framework.
 */
class CEFServiceProvider extends ServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $container
     */
    public function register(Container $container)
    {
        $container[$this->namespace.'.cef'] = function ($container) {
            $configKey = $this->namespace.'.cef.config';

            if (!isset($container[$configKey])) {
                $container[$configKey] = new CEFConfig();
            }

            $cef = new CEF($container[$configKey]);
            $this->populateConfig('cef', $container);

            return $cef;
        };

        $container[$this->namespace.'.cef.controller_factory'] = $container->protect(
            function ($class) use ($container) {
                /** @var CEF $cef */
                $cef = $container[$this->namespace.'.cef'];

                return $cef->getEntityManager($class);
            }
        );

        $container[$this->namespace.'.cef.serializer'] = $container->protect(
            function (EntityModel $entity) {
                return $entity->toJson();
            }
        );
    }
}
