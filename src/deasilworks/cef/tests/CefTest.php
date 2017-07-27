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
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

use deasilworks\cef\CEF;
use deasilworks\cef\Config;
use deasilworks\cef\EntityModel;
use deasilworks\cef\ResultContainer;
use deasilworks\cef\Statement\Simple;
use deasilworks\cef\StatementBuilder\Select;
use deasilworks\cef\test\Collection\LocalCollection;
use deasilworks\cef\test\Collection\UserCollection;
use deasilworks\cef\test\Manager\LocalManager;
use deasilworks\cef\test\Manager\UserManager;
use deasilworks\cef\test\Model\UdtAddressModel;
use deasilworks\cef\test\Model\UserModel;

/**
 * Class cassandraTest.
 */
class CefTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LocalManager
     */
    private $localMgr;

    /**
     * @var UserManager
     */
    private $userMgr;

    /**
     * @var Config
     */
    private $config;

    /**
     * @return Config
     */
    private function getConfig()
    {
        if (!$this->config) {
            $this->config = new Config();
        }

        return $this->config;
    }

    /**
     * Get Local Entity Manager.
     *
     * @return LocalManager
     */
    private function getLocalManager()
    {
        if (!$this->localMgr || !($this->localMgr instanceof LocalManager)) {
            $cef = new CEF($this->getConfig()->setKeyspace('system'));
            $this->localMgr = $cef->getEntityManager(LocalManager::class);
        }

        return $this->localMgr;
    }

    /**
     * Get User Entity Manager.
     *
     * @return UserManager
     */
    private function getUserManager()
    {
        if (!$this->userMgr || !($this->userMgr instanceof UserManager)) {
            $cef = new CEF($this->getConfig()->setKeyspace('test_4klift'));
            $this->userMgr = $cef->getEntityManager(UserManager::class);
        }

        return $this->userMgr;
    }

    /**
     * CEF Test.
     */
    public function testCEF()
    {
        /** @var LocalManager $entityMgr */
        $entityMgr = $this->getLocalManager();

        /** @var Simple $statementMgr */
        $statementMgr = $entityMgr
            ->getStatementManager(Simple::class);

        /** @var Select $stmtBuilder */
        $stmtBuilder = $statementMgr->getStatementBuilder(Select::class);

        // the default SELECT_JSON_TYPE is not available in cassandra 2.x
        $statementMgr->setStatement(
            $stmtBuilder->setType(Select::SELECT_TYPE)
        );

        $localCollection = $statementMgr->execute();

        $this->assertGreaterThan(0, $localCollection->getCount());

        /** @var \deasilworks\cef\test\Model\LocalModel $localModel */
        $localModel = $localCollection->current();

        // does it exist?
        $this->assertTrue($localModel->getKey() == 'local');
    }

    /**
     * Test table create.
     */
    public function testTableCreate()
    {
        $mgr = $this->getLocalManager();

        /** @var Simple $statementMgr */
        $statementMgr = $mgr
            ->getStatementManager(Simple::class);

        $keyspaceCreateString = "CREATE KEYSPACE IF NOT EXISTS test_4klift WITH replication = {'class': 'SimpleStrategy', 'replication_factor': 1}";

        $statementMgr->setStatement($keyspaceCreateString)->execute();

        $typeDropString = 'DROP TYPE IF EXISTS test_4klift.udt_address';

        $statementMgr->setStatement($typeDropString);

        $tableDropString = 'DROP TABLE IF EXISTS test_4klift.user';

        $statementMgr->setStatement($tableDropString);

        /** @var \Cassandra\Statement $statement */
        $statement = $statementMgr->getStatement();
        $this->assertInstanceOf(\Cassandra\SimpleStatement::class, $statement);

        $statementMgr->execute();

        $udtCreateString = '
            CREATE TYPE IF NOT EXISTS test_4klift.udt_address (
              street text,
              street2 text,
              city text,
              state text,
              zip text,
              country text
            );
        ';

        $statementMgr->setStatement($udtCreateString)->execute();

        $tableCreateString = '
            CREATE TABLE IF NOT EXISTS test_4klift.user (
              username text,
              first_name text,
              last_name text,
              email text,
              message text,
              address frozen<udt_address>,
              PRIMARY KEY (username)
            );
        ';

        $statementMgr->setStatement($tableCreateString)->execute();
    }

    /**
     * @depends testTableCreate
     */
    public function testEntityManager()
    {
        /** @var UserManager $userMgr */
        $userMgr = $this->getUserManager();

        $resCollection = $userMgr->getCollectionClass();
        $this->assertEquals(UserCollection::class, $resCollection);

        $usrCollection = new $resCollection($userMgr);
        $this->assertInstanceOf(ResultContainer::class, $usrCollection);
        $this->assertInstanceOf(UserCollection::class, $usrCollection);

        /** @var UserModel $userModel */
        $userModel = $userMgr->getModel();

        $this->assertInstanceOf(UserModel::class, $userModel, 'StatementManager model factory test.');
        $this->assertInstanceOf(EntityModel::class, $userModel, 'StatementManager model factory test.');

        // test setCollectionClass this is just to test the setter since
        // local collection can not hold user models...

        $userMgr->setCollectionClass(LocalCollection::class);

        $resCollection = $userMgr->getCollectionClass();
        $this->assertEquals(LocalCollection::class, $resCollection);

        $localCollection = new $resCollection($userMgr);
        $this->assertInstanceOf(ResultContainer::class, $localCollection);
        $this->assertInstanceOf(LocalCollection::class, $localCollection);
    }

    /**
     * @depends testTableCreate
     */
    public function testStatementBuilder()
    {
        /** @var UserManager $userMgr */
        $userMgr = $this->getUserManager();

        $stmtBuilder = $userMgr->getStatementManager(Simple::class);

        $this->assertInstanceOf(Simple::class, $stmtBuilder);
    }

    /**
     * @depends testTableCreate
     */
    public function testInsertUpdate()
    {
        /** @var UserManager $userMgr */
        $userMgr = $this->getUserManager();

        /** @var \deasilworks\cef\test\Model\UserModel $userModel */
        $userModel = $userMgr->getModel();

        $addressModel = new UdtAddressModel();

        $userModel
            ->setUsername('4klift')
            ->setFirstName('Deasil')
            ->setLastName('Works')
            ->setEmail('code@deasil.works')
            ->setMessage('Testing 4klift')
            ->setAddress(
                $addressModel
                    ->setStreet('1812 W. Burbank Blvd., #674')
                    ->setCity('Burbank')
                    ->setState('CA')
                    ->setZip('91506')
                    ->setCountry('USA')
            )
            ->save();

        // testing default select (JSON)
        // ----------------------------------------------
        $userModel = $userMgr->getUserByUsername('4klift', Select::SELECT_JSON_TYPE);

        $this->assertInternalType('string', $userModel->getUsername());
        $this->assertInternalType('string', $userModel->getEmail());
        $this->assertInternalType('string', $userModel->getMessage());

        $this->assertTrue($userModel->getFirstName() == 'Deasil');
        $this->assertTrue($userModel->getEmail() == 'code@deasil.works');

        $this->assertInstanceOf(UdtAddressModel::class, $userModel->getAddress());

        // testing generic select (non JSON)
        $userModel = $userMgr->getUserByUsername('4klift', Select::SELECT_TYPE);

        $this->assertTrue($userModel->getFirstName() == 'Deasil');
        $this->assertInternalType('string', $userModel->getUsername());
        $this->assertInternalType('string', $userModel->getEmail());
        $this->assertInternalType('string', $userModel->getMessage());

        $this->assertTrue($userModel->getEmail() == 'code@deasil.works');
        $this->assertInstanceOf(UdtAddressModel::class, $userModel->getAddress());
    }
}
