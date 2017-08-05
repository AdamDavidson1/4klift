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

namespace deasilworks\CMS\CEF\Manager;

use deasilworks\API\Annotation\ApiAction;
use deasilworks\API\Annotation\ApiController;
use deasilworks\CEF\EntityManager;
use deasilworks\CEF\Statement\Simple;
use deasilworks\CEF\StatementBuilder\Select;
use deasilworks\CMS\CEF\Collection\PageCollection;
use deasilworks\CMS\CEF\Model\PageModel;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class PageManager.
 *
 * @ApiController()
 */
class PageManager extends EntityManager
{
    /**
     * @var string
     */
    protected $collectionClass = PageCollection::class;

    /**
     * Set Page.
     *
     * @ApiAction()
     *
     * @param PageModel $pageModel
     *
     * @return bool
     */
    public function setPage(PageModel $pageModel)
    {
        $pageModel
            ->setModified(new \DateTime())
            ->setEntityManager($this)
            ->save();

        return true;
    }

    /**
     * Get Page.
     *
     * @ApiAction()
     *
     * @param string $stub the url friendly name of the page.
     *
     * @return PageModel
     */
    public function getPage($stub)
    {
        $stmtManager = $this->getStatementManager(Simple::class);

        /** @var Select $stmtBuilder */
        $stmtBuilder = $stmtManager->getStatementBuilder(Select::class);

        /** @var PageCollection $collection */
        $collection = $stmtManager->setStatement(
            $stmtBuilder->setWhere(['stub = :stub'])
        )
            ->setArguments(['stub' => $stub])
            ->execute();

        return $collection->current();
    }

    /**
     * Set Message.
     *
     * This is a 4klift test method.
     *
     * @ApiAction()
     *
     * @param string $message
     *
     * @return string
     */
    public function setMessage($message)
    {
        return $message;
    }

    /**
     * Update Message.
     *
     * This is a 4klift test method.
     *
     * @ApiAction()
     *
     * @param string $message
     *
     * @return string
     */
    public function updateMessage($message)
    {
        return $message;
    }

    /**
     * Get Message.
     *
     * This is a 4klift test method.
     *
     * @ApiAction()
     *
     * @return string
     */
    public function getMessage()
    {
        return 'Test Message';
    }
}
