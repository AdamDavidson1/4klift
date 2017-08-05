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

use deasilworks\CEF\CEF;
use deasilworks\CEF\CEFConfig;
use deasilworks\CMS\CEF\Model\PageModel;
use deasilworks\CMS\CEF\Collection\PageCollection;

/**
 * Class ModelTest.
 *
 * @SuppressWarnings(PHPMD)
 * We do bad things here and we like it.
 */
class ModelTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test Page.
     */
    public function testPage()
    {
        $pageModel = new PageModel();

        $pageModelClass = get_class($pageModel);

        $this->assertInstanceOf($pageModelClass, $pageModel->setTitle('Test Page'));
        $this->assertInstanceOf($pageModelClass, $pageModel->setStub('test-page'));
        $this->assertInstanceOf($pageModelClass, $pageModel->setModified(new \DateTime()));
        $this->assertInstanceOf($pageModelClass, $pageModel->setContent('This is a test page.'));

        $this->assertEquals('Test Page', $pageModel->getTitle());
        $this->assertEquals('test-page', $pageModel->getStub());
        $this->assertInstanceOf('\DateTime', $pageModel->getModified());
        $this->assertEquals('This is a test page.', $pageModel->getContent());

        $cef = new CEF(new CEFConfig());
        $pageManager = $cef->getEntityManager(\deasilworks\CMS\CEF\Manager\PageManager::class);

        /** @var PageCollection $pageCollection */
        $pageCollection = new PageCollection($pageManager);

        $pageCollection->setCollection([$pageModel]);

        $this->assertInstanceOf($pageModelClass, $pageCollection->current());

    }

}
