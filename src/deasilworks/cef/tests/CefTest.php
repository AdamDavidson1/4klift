<?php

use deasilworks\cef\Statement\Simple;
use deasilworks\cef\StatementBuilder\Select;
use deasilworks\cef\test\Manager\LocalManager;
use deasilworks\cef\test\Manager\UserManager;
use deasilworks\cef\test\Model\UserModel;
use deasilworks\cef\EntityModel;
use deasilworks\cef\test\Collection\UserCollection;
use deasilworks\cef\ResultContainer;
use deasilworks\cef\test\Collection\LocalCollection;

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
     * Get Local Entity Manager.
     *
     * @return LocalManager
     */
    private function getLocalManager()
    {
        if (!$this->localMgr || !($this->localMgr instanceof LocalManager)) {
            $this->localMgr = new LocalManager();
            $this->localMgr->setConfig(['keyspace' => 'system', 'contact_points' => ['127.0.0.1']]);
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
            $this->userMgr = new UserManager();
            $this->userMgr->setConfig(['keyspace' => 'test_4klift', 'contact_points' => ['127.0.0.1']]);
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
        $userMgr = new UserManager();
        $userMgr->setConfig(['keyspace' => 'system', 'contact_points' => ['127.0.0.1']]);

        /** @var Simple $statementMgr */
        $statementMgr = $userMgr
            ->getStatementManager(Simple::class);

        $keyspaceCreateString = "CREATE KEYSPACE IF NOT EXISTS test_4klift WITH replication = {'class': 'SimpleStrategy', 'replication_factor': 1}";

        $statementMgr->setStatement($keyspaceCreateString)->execute();

        $tableDropString = 'DROP TABLE IF EXISTS test_4klift.user';

        $statementMgr->setStatement($tableDropString);

        /** @var \Cassandra\Statement $statement */
        $statement = $statementMgr->getStatement();
        $this->assertInstanceOf(\Cassandra\SimpleStatement::class, $statement);

        $statementMgr->execute();

        $tableCreateString = '
            CREATE TABLE IF NOT EXISTS test_4klift.user (
              username text,
              email text,
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

        $usrCollection = new $resCollection;
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

        $localCollection = new $resCollection;
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

        $userModel
            ->setUsername('4klift')
            ->setEmail('code@deasil.works')
            ->save();

        $userModel = $userMgr->getUserByUsername('4klift');

        $this->assertTrue($userModel->getEmail() == 'code@deasil.works');
    }
}
