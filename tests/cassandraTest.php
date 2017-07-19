<?php

/**
 * Class cassandraTest
 */
class cassandraTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Cassandra Driver Test
     */
    public function testHasCassandraDriver()
    {
        $this->assertTrue(class_exists(\Cassandra::class));

        return;
    }

    /**
     * Cassandra Connect Test
     * @depends testHasCassandraDriver
     */
    public function testCassandraConnect()
    {
        /** @var \Cassandra\Cluster $cluster */
        $cluster = \Cassandra::cluster()->build();

        /** @var \Cassandra\Session $session */
        $session   = $cluster->connect('system');

        $statement = new \Cassandra\SimpleStatement('SELECT cluster_name, release_version, cql_version from local');

        /** @var \Cassandra\Future $future */
        $future    = $session->executeAsync($statement, new \Cassandra\ExecutionOptions(array()));

        /** @var \Cassandra\Rows $result */
        $result = $future->get(5);

        $this->assertGreaterThan(0, $result->count());
        $row = $result->current();

        $this->assertArrayHasKey('cluster_name', $row);
        $this->assertTrue($row['cluster_name'] == 'Test Cluster');
        $this->assertTrue(true);
    }

}