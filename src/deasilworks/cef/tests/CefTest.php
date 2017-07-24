<?php

use deasilworks\cef\Statement\Simple;
use deasilworks\cef\StatementBuilder\Select;

use deasilworks\cef\test\Manager\LocalEntityManager;

/**
 * Class cassandraTest.
 */
class CefTest extends \PHPUnit_Framework_TestCase
{
    private $entityMgr;

    /**
     * Get Local Entity Manager.
     *
     * @return LocalEntityManager
     */
    private function getLocalEntityManager()
    {
        if (!$this->entityMgr || !($this->entityMgr instanceof LocalEntityManager)) {
            $this->entityMgr = new LocalEntityManager();
            $this->entityMgr->setConfig(['keyspace' => 'system', 'contact_points' => ['127.0.0.1']]);
        }

        return $this->entityMgr;
    }

    /**
     * CEF Test.
     */
    public function testCEF()
    {
        /** @var LocalEntityManager $entityMgr */
        $entityMgr = $this->getLocalEntityManager();

        /** @var Simple $statementMgr */
        $statementMgr = $entityMgr
            ->getStatementManager(Simple::class);

        /** @var Select $stmtBuilder */
        $stmtBuilder = $statementMgr->getStatementBuilder(Select::class);

        // the default SELECT_JSON_TYPE is not available in cassandra 2.x
        $statementMgr->setStatement($stmtBuilder->setType(Select::SELECT_TYPE)->setFrom('local'));

        /** @var \deasilworks\cef\ResultContainer $resultContainer */
        $resultContainer = $statementMgr->execute();

        /** @var \deasilworks\cef\EntityModel $entityMgr */
        $entityMgr = $resultContainer->current();

        // does it exist?
        $this->assertTrue(property_exists($entityMgr, 'cluster_name'));

        // is not null?
        $this->assertTrue(isset($entityMgr->cluster_name));
    }

    /**
     * Test table create
     */
    public function testTableCreate()
    {
        /** @var LocalEntityManager $entityMgr */
        $entityMgr = $this->getLocalEntityManager();

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
        $this->assertTrue(true);
    }
}
