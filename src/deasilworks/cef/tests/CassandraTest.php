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
