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

use deasilworks\API\ServiceProvider\Silex\APIServiceProvider;
use deasilworks\CEF\ServiceProvider\Silex\CEFServiceProvider;
use deasilworks\CFG\ServiceProvider\Silex\CFGServiceProvider;
use deasilworks\CMS\ServiceProvider\Silex\CMSServiceProvider;
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
$app['debug'] = true;
$app['debug'] ? ini_set('display_errors', true) : true;

// 4klift Components - CFG, CEF, CMS and API
//
$app->register(new CFGServiceProvider(), [
    'deasilworks.cfg.load_files' => [
        __DIR__ . '/../cfg/defaults.yml',
        __DIR__ . '/../cfg/application.yml',
        __DIR__ . '/../cfg/parameters.yml',
    ],
    'deasilworks.cfg.app_root' => __DIR__,
]);

$app->register(new CEFServiceProvider());
$app->register(new APIServiceProvider());
$app->register(new CMSServiceProvider());

// Services
//
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new HttpFragmentServiceProvider());

$app->register(new TwigServiceProvider());
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    return $twig;
});

if ($app['debug'] === true) {
    $app->register(new WebProfilerServiceProvider());
    $app->register(new MonologServiceProvider());
}

return $app;
