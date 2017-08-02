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

use deasilworks\api\ServiceProvider\Silex\APIServiceProvider;
use deasilworks\cef\ServiceProvider\Silex\CEFServiceProvider;
use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;

if (!ini_get('date.timezone')) {
    date_default_timezone_set('UTC');
}

$app = new Application();

// enable the debug mode
//
ini_set('display_errors', true);
$app['debug'] = true;

// register services
//
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());

// CEF
$app->register(new CEFServiceProvider(), [
    'deasilworks.cef.keyspace' => 'fl_cms',
]);

// API
$app->register(new APIServiceProvider(), [
    'deasilworks.api.class_path' => 'deasilworks\cms\CEF\Manager',
    'deasilworks.api.aliases'    => [
        'content' => 'PageManager',
        'acl'     => 'User\AclManager',
    ],
]);

// twig (templating)
//
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    return $twig;
});
$app['twig.path'] = [__DIR__.'/../templates'];
$app['twig.options'] = ['cache' => __DIR__.'/../var/cache/twig'];

// debug
//
if ($app['debug'] === true) {
    $app->register(new MonologServiceProvider(), [
        'monolog.logfile' => __DIR__.'/../var/logs/silex_dev.log',
    ]);

    $app->register(new WebProfilerServiceProvider(), [
        'profiler.cache_dir' => __DIR__.'/../var/cache/profiler',
    ]);
}

$app->match('/api/{path}', 'deasilworks.api.responder')
    ->assert('path', '.*');

$app->get('/', function () use ($app) {

    /** @var \deasilworks\cms\CEF\Manager\PageManager $pageMgr */
    $pageMgr = $app['deasilworks.cef']->getEntityManager(\deasilworks\cms\CEF\Manager\PageManager::class);

    try {
        $pageModel = $pageMgr->getPage('welcome');
    } catch (\Exception $exception) {
        return $app['twig']->render('setup.html.twig', ['message' => $exception->getMessage()]);
    }

    return $app['twig']->render('index.html.twig', ['pageModel' => $pageModel]);
})
    ->bind('homepage');

return $app;
