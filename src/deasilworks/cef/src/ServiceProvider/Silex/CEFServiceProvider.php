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

namespace deasilworks\CEF\ServiceProvider\Silex;

use deasilworks\CEF\CEF;
use deasilworks\CEF\CEFConfig;
use deasilworks\CEF\EntityDataModel;
use deasilworks\CFG\CFG;
use deasilworks\CFG\ServiceProvider\Silex\ServiceProvider;
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
            $cef = null;
            $cefConfigKey = $this->namespace.'.cef.config';
            $cfgKey = $this->namespace.'.cfg';

            if (isset($container[$cfgKey])) {
                /** @var CFG $cfg */
                $cfg = $container[$cfgKey];

                if (!isset($container[$cefConfigKey])) {
                    $container[$cefConfigKey] = new CEFConfig($cfg);
                }

                $cef = new CEF($container[$cefConfigKey]);

                $this->populateConfig($container[$cefConfigKey], 'cef', $cfg->getAll());
            }

            // next try to populate from the container
            $this->populateConfig($container[$cefConfigKey], 'cef', $container);

            return $cef;
        };

        $container[$this->namespace.'.cef.controller_factory'] = $container->protect(
            function ($class, $routeConfig) use ($container) {
                /** @var CEF $cef */
                $cef = $container[$this->namespace.'.cef'];

                if (is_array($routeConfig)) {
                    $cefConfig = $cef->getConfig();

                    foreach ($routeConfig as $key => $value) {
                        $cfgSetter = 'set' . ucfirst($key);
                        if (method_exists($cefConfig, $cfgSetter)) {
                            $cefConfig->$cfgSetter($value);
                        }
                    }
                }

                return $cef->getManager($class);
            }
        );

        $container[$this->namespace.'.cef.serializer'] = $container->protect(
            function (EntityDataModel $entity) {
                return $entity->toJson();
            }
        );
    }
}
