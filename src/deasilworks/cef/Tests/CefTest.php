<?php

use deasilworks\cef\CEF;
use \deasilworks\cef\StatementBuilder\Select;
use \deasilworks\cef\Statement\Simple;

require_once (__DIR__ . '/src/TestEntityManager.php');

/**
 * Class cassandraTest
 */
class CefTest extends \PHPUnit_Framework_TestCase
{
    private $entityMgr;

    private function getTestEntityManager()
    {
        if (!$this->entityMgr || !$this->entityMgr instanceof TestEntityManager) {
            $this->entityMgr = new TestEntityManager();
            $this->entityMgr->setConfig(array('keyspace' => 'system', 'contact_points' => array('127.0.0.1')));
        }

        return $this->entityMgr;
    }

    /**
     * CEF Test
     */
    public function testCEF()
    {
        /** @var TestEntityManager $entityMgr */
        $entityMgr = $this->getTestEntityManager();

        /** @var Simple $statementMgr */
        $statementMgr = $entityMgr
            ->getStatementManager(Simple::class);

        /** @var Select $stmtBuilder */
        $stmtBuilder = $statementMgr->getStatementBuilder(Select::class);

        // the default SELECT_JSON_TYPE is not available in cassandra 2.x
        $statementMgr->setStatement($stmtBuilder->setType(Select::SELECT_TYPE)->setFrom('local'));

        /** @var \deasilworks\cef\ResultContainer $ec */
        $resultContainer = $statementMgr->execute();

        /** @var \deasilworks\cef\EntityModel $entityMgr */
        $entityMgr = $resultContainer->current();

        // does it exist?
        $this->assertTrue(property_exists($entityMgr, 'cluster_name'));

        // is not null?
        $this->assertTrue(isset($entityMgr->cluster_name));
    }

}