#!/usr/bin/env php
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

ini_set('memory_limit', '5120M');
error_reporting(E_ALL & ~E_NOTICE);

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;

/**
 * Create a Silex CLI application
 */
$cli = new Application('4klift - Command Line Utilities', '1.0.0');

/**
 * Add CLI Command Class names here.
 */
$command_classes = array(
    \deasilworks\cms\Util\Command\InstallCommand::class,
);

/**
 * Storage for the instantiated classes
 */
$commands = array();

/**
 * Instantiate classes into command and add to cli app.
 */
foreach ($command_classes as $command_class) {
    $commands[$command_class] = new $command_class();
    $cli->add($commands[$command_class]);
}

/**
 * Run CLI application
 */
$cli->run();