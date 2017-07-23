<?php

/**
 * Class cassandraTest.
 */
class CassandraTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Cassandra Driver Test.
     */
    public function testHasCassandraDriver()
    {
        $this->assertTrue(class_exists(\Cassandra::class));
    }

    /**
     * Cassandra Connect Test.
     *
     * @depends testHasCassandraDriver
     */
    public function testCassandraConnect()
    {
        /** @var \Cassandra\Cluster $cluster */
        $cluster = \Cassandra::cluster()
            ->withContactPoints('127.0.0.1')
            ->build();

        /** @var \Cassandra\Session $session */
        $session = $cluster->connect('system');

        $statement = new \Cassandra\SimpleStatement('SELECT cluster_name, release_version, cql_version from local');

        /** @var \Cassandra\Future $future */
        $future = $session->executeAsync($statement);

        /** @var \Cassandra\Rows $result */
        $result = $future->get(5);

        $this->assertGreaterThan(0, $result->count());
        $row = $result->current();

        $this->assertArrayHasKey('cluster_name', $row);
        $this->assertArrayHasKey('release_version', $row);
        $this->assertArrayHasKey('cql_version', $row);
        $this->assertTrue($row['cluster_name'] == 'Test Cluster');
        $this->assertTrue(true);

        printf("\nCASSANDRA VERSION EXTENSION: %s\n", \Cassandra::VERSION);
        printf("CASSANDRA VERSION DRIVER: %s\n", \Cassandra::CPP_DRIVER_VERSION);
        printf("CASSANDRA VERSION RELEASE: %s\n", $row['release_version']);
        printf("CASSANDRA VERSION CQL: %s\n", $row['cql_version']);
    }
}
