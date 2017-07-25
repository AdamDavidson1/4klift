<?php

use deasilworks\cef\Statement\Simple;
use deasilworks\cef\StatementBuilder\Select;

use deasilworks\cef\test\Manager\LocalManager;
use deasilworks\cef\test\Manager\UserManager;

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
     * Test table create
     */
    public function testTableCreate()
    {
        /** @var UserManager $entityMgr */
        $entityMgr = $this->getUserManager();

        /** @var Simple $statementMgr */
        $statementMgr = $entityMgr
            ->getStatementManager(Simple::class);

        $keyspaceCreateString = "CREATE KEYSPACE IF NOT EXISTS test_4klift WITH replication = {'class': 'SimpleStrategy', 'replication_factor': 1}";

        $statementMgr->setStatement($keyspaceCreateString)->execute();

        $tableDropString = 'DROP TABLE IF EXISTS test_4klift.user';

        $statementMgr->setStatement($tableDropString)->execute();

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
        
    }
}
