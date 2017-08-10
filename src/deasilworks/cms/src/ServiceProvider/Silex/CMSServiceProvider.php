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

namespace deasilworks\CMS\ServiceProvider\Silex;

use deasilworks\CFG\ServiceProvider\Silex\ServiceProvider;
use deasilworks\CMS\CEF\Manager\PageDataManager;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Api\BootableProviderInterface;
use Silex\Application;

/**
 * Class APIServiceProvider.
 *
 * Responsible for providing API as a service to
 * the applications built on the Silex framework.
 */
class CMSServiceProvider extends ServiceProvider implements ServiceProviderInterface, BootableProviderInterface
{
    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {
        $app->get('/', function () use ($app) {

            /** @var \deasilworks\cms\CEF\Manager\PageDataManager $pageMgr */
            $pageMgr = $app[$this->namespace.'.cef']->getDataManager(PageDataManager::class);

            try {
                $pageModel = $pageMgr->getPage('welcome');
            } catch (\Exception $exception) {
                return $app['twig']->render('4klift-setup.html.twig', ['message' => $exception->getMessage()]);
            }

            return $app['twig']->render('4klift-index.html.twig', ['pageModel' => $pageModel]);
        })
            ->bind('homepage');
    }

    /**
     * @param Container $container
     */
    public function register(Container $container)
    {
        $container[$this->namespace.'.cms.registered'] = true;
    }
}
