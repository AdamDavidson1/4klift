<?php

use deasilworks\cef\CEF;

require_once (__DIR__ . '/src/TestEntityManager.php');

/**
 * Class cassandraTest
 */
class cefTest extends \PHPUnit_Framework_TestCase
{
    /**
     * CEF Test
     */
    public function testCEF()
    {
        $app = new \Silex\Application();
        $app->register(new CEF());

        $em = new TestEntityManager();
        $em->setConfig(array('keyspace' => 'system'));

        $sm = $em
            ->getStatementManager(\deasilworks\cef\Statement\Simple::class);

        /** @var \deasilworks\cef\StatementBuilder\Select $sb */
        $sb = $sm->getStatementBuilder(\deasilworks\cef\StatementBuilder\Select::class);

        $sm->setStatement($sb->setFrom('local'));

        /** @var \deasilworks\cef\ResultContainer $ec */
        $rc = $sm->execute();

        /** @var \deasilworks\cef\EntityModel $em */
        $em = $rc->current();

        // does it exist?
        $this->assertTrue(property_exists($em, 'cluster_name'));

        // is is not null?
        $this->assertTrue(isset($em->cluster_name));

    }

}