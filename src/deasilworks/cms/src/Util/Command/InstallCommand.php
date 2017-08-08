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

namespace deasilworks\CMS\Util\Command;

use deasilworks\CEF\EntityManager;
use deasilworks\CEF\Statement\Simple;
use deasilworks\CEF\StatementManager;
use deasilworks\CMS\CEF\Manager\PageManager;
use deasilworks\CMS\CEF\Model\PageModel;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class InstallCommand.
 *
 * Responsible for installing CMS.
 *  - Creating tables
 *  - Creating configuration
 */
class InstallCommand extends CMSCommand
{
    /**
     * @var StatementManager
     */
    private $stmtManager;

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName('cms-install');
        $this->setDescription('Install 4klift CMS');

        $this->addOption('keyspace', null, InputOption::VALUE_REQUIRED, 'Keyspace', 'fl_cms');
        $this->addOption('prefix', null, InputOption::VALUE_REQUIRED, 'Prefix', 'fl_');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->cio = new SymfonyStyle($input, $output);

        $keyspace = $input->getOption('keyspace');

        $this->cio->title('Installing 4klift CMS');

        $files = [
            'CQL/keyspace.cql.twig',
            'CQL/Table/page.cql.twig',
        ];

        foreach ($files as $template) {
            $this->exeCql(
                $this->getCqlFromTemplate(
                    $template,
                    ['keyspace' => $keyspace])
            );
        }

        // add a sample page
        //
        $this->cef->getConfig()->setKeyspace($keyspace);

        /** @var PageManager $pageMgr */
        $pageMgr = $this->cef->getEntityManager(PageManager::class);

        /** @var PageModel $pageModel */
        $pageModel = $pageMgr->getModel();

        $pageModel
            ->setStub('welcome')
            ->setTitle('Welcome')
            ->setContent('Welcome to the 4klift CMS')
            ->setModified(new \DateTime())
            ->save();

        /** @var PageModel $retPageModel */
        $retPageModel = $pageMgr->getPage('welcome');

        if ($retPageModel->getStub() != 'welcome') {
            $this->cio->error('Something went wrong. Could not get the sample page.');

            return;
        }

        $this->cio->writeln('done...');
    }

    /**
     * @param $template
     * @param $args
     *
     * @return string
     */
    protected function getCqlFromTemplate($template, $args)
    {
        return $this->twig->load($template)->render($args);
    }

    /**
     * @param $cql
     */
    protected function exeCql($cql)
    {
        if (!$this->stmtManager) {
            $entityManager = new EntityManager($this->cef->getConfig());
            $this->stmtManager = $entityManager->getStatementManager(Simple::class);
        }

        $this->stmtManager->setStatement($cql)->execute();
        $this->stmtManager->reset();
    }
}
