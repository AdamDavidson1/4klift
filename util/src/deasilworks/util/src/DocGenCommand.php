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

namespace deasilworks\Util;

use PHPDocMD\Generator;
use PHPDocMD\Parser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

error_reporting(E_ERROR | E_PARSE);

/**
 * Class DocGenCommand.
 */
class DocGenCommand extends Command
{
    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName('util-docgen');
        $this->setDescription('Generate and install project documentation in markdown.');

        $components = 'api,cef,cfg,cms';

        $this->addOption('component', 'c', InputOption::VALUE_REQUIRED, 'Components', $components);
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Generating Documentation');

        // get phpdoc if is does not exists
        $phpDocPath = '../build/phpDocumentor.phar';

        if (!file_exists($phpDocPath)) {
            $io->writeln('Downloading phpDocumentor...');
            copy('http://phpdoc.org/phpDocumentor.phar', $phpDocPath);
        }

        $components = explode(',', $input->getOption('component'));

        // generate for each project
        foreach ($components as $component) {
            $io->writeln('Generating markdown for component '.$component.'.');

            exec('php '.
                $phpDocPath.
                ' -d ../src/deasilworks/'.$component.'/src'.
                ' -t ../src/deasilworks/'.$component.'/docs/api'.
                ' --template="xml"'.
                ' --cache-folder="../var/cache/phpdoc/'.$component.'"'
            );

            $parser = new Parser('../src/deasilworks/'.$component.'/docs/api/structure.xml');
            $classDefs = $parser->run();
            $outputDir = '../src/deasilworks/'.$component.'/docs/api';
            $templateDir = __DIR__.'/../templates/docgen/';

            $generator = new Generator(
                $classDefs,
                $outputDir,
                $templateDir,
                '%c.md',
                'README.md'
            );

            $generator->run();
        }
    }
}
