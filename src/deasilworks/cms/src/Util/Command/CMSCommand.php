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

namespace deasilworks\cms\Util\Command;

use deasilworks\cef\CEF;
use deasilworks\cef\CEFConfig;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;

if (!ini_get('date.timezone')) {
    date_default_timezone_set('UTC');
}

/**
 * Class CMSCommand.
 */
abstract class CMSCommand extends Command
{
    /**
     * @var SymfonyStyle
     */
    protected $io;

    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @var CEF
     */
    protected $cef;

    /**
     * InstallCommand constructor.
     *
     * @param null $name
     */
    public function __construct($name = null)
    {
        parent::__construct($name);

        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../Template/');
        $this->twig = new \Twig_Environment($loader);

        $cefConfig = new CEFConfig();
        $this->cef = new CEF($cefConfig);
    }
}
