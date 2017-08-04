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

namespace deasilworks\cef\test\Manager;

use deasilworks\CEF\EntityManager;
use deasilworks\CEF\Statement\Simple;
use deasilworks\CEF\StatementBuilder\Select;
use deasilworks\CEF\test\Collection\UserCollection;
use deasilworks\CEF\test\Model\LocalModel;

class UserManager extends EntityManager
{
    /**
     * A ResultContainer class.
     *
     * @var string
     */
    protected $collectionClass = UserCollection::class;

    /**
     * @var Simple Simple Statement Manger
     */
    protected $ssm;

    /**
     * Get Simple statement manager.
     */
    public function getSimpleStatementManager()
    {
        if (!$this->ssm) {
            /* @var Simple $simple */
            $this->ssm = $this->getStatementManager(Simple::class);
        }

        return $this->ssm;
    }

    /**
     * Get user by username.
     *
     * @param $username
     * @param $type
     *
     * @return LocalModel
     */
    public function getUserByUsername($username, $type = Select::SELECT_TYPE)
    {
        $ssm = $this->getSimpleStatementManager();

        /** @var Select $stmtBuilder */
        $stmtBuilder = $ssm->getStatementBuilder(Select::class);

        $ssm->setStatement(
            $stmtBuilder->setWhere(['username = :username'])->setType($type)
        )
            ->setArguments(['username' => (string) $username]);

        /** @var \deasilworks\cef\test\Collection\UserCollection $userCollection */
        $userCollection = $ssm->execute();

        /* @var \deasilworks\cef\test\Model\LocalModel $localModel */
        return $userCollection->current();
    }
}
