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

namespace deasilworks\CMS\CEF\Domain\Manager;

use deasilworks\API\Annotation\ApiAction;
use deasilworks\API\Annotation\ApiController;
use deasilworks\CEF\DomainEntityManager;
use deasilworks\CMS\CEF\Data\Manager\PageDataManager;

/**
 * Class ContentDomainManager.
 *
 * @ApiController()
 */
class ContentDomainManager extends DomainEntityManager
{
    /**
     * Get Welcome.
     *
     * @ApiAction()
     *
     * @return string
     */
    public function getWelcome()
    {
        $stub = $this->getCfgValue('demo.pages.welcome', 'nope');

        /** @var PageDataManager $pageMgr */
        $pageMgr = $this->getDataManager(PageDataManager::class);
        return $pageMgr->getPage($stub)->getTitle();
    }
}
